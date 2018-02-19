<?php
namespace app\services;
use Yii;
use yii\httpclient\Client;
use keltstr\simplehtmldom\SimpleHTMLDom as SHD;
use app\models\Category;
use app\models\Product;

class DatabaseUtil
{
	private $baseUrl = "http://www.sct.com.tw";

    public function getProductDetails($id) {

        $product = Product::find()->where(["id" => $id])->one();
        $category_id = $product["category_id"];
        $category = Category::find()->where(["id" => $category_id])->one();
        $ret = [
            "product" => $product,
            "category" => $category,
        ];
        if($category["parent_id"]) {
            $parent_category = Category::find()->where(["id" => $category["parent_id"]])->one();
            $ret["parent_category"] = $parent_category;
        }
        return $ret;
    }

    public function getProducts($condArray) {

        $productSearch = Product::find();
        if($condArray) {
            if(isset($condArray["category_id"])) {
                $category_id = $condArray["category_id"];
                $category = Category::find()->where(["id" => $category_id])->one();
                if(!$category["parent_id"]) {
                    
                    $products = Product::find()->where(["category_id" => $category["id"]])->all();;

                    $categories = Category::find()->where(["parent_id" => $category_id])->all();
                    foreach($categories as $item) {
                        $condArray = ["category_id" => $item["id"]];
                        $subset = self::getProducts($condArray);
                        $products = array_merge($products,$subset);
                    }
                    return $products;
                }
                $productSearch = $productSearch->andWhere(["category_id" => $category_id]);
            }
            if(isset($condArray["text"])) {
                $text = $condArray["text"];
                $productSearch = $productSearch->andWhere(
                    ['or', ['like', 'name', $text], ['like', 'description', $text], ['like', 'specifications', $text], ['like', 'detail', $text]]);
            }
            if(isset($condArray["text"])) {

            }
        }
        if(!$condArray) {
            $productSearch = $productSearch->limit(12);
        }        
        $products = $productSearch->all();
        return $products;
    }

    public function getCategories() {
        $categories = Category::find()->all();
        $categoriesWithLayer = [];
        foreach($categories as $item) {
            if(!$item["parent_id"]) {
                $categoriesWithLayer[] = $item;
            }
        }
        $i=0;
        foreach($categoriesWithLayer as $item) {
            $id = $item["id"];
            $children = [];
            foreach($categories as $category) {
                if($category["parent_id"] == $id) {
                    $children[] = $category;
                }
            }

            $categoriesWithLayer[$i]["children"] = $children;
            $i++;
        }
        return $categoriesWithLayer;
    }
    public function getProductInfo($client,$secondLevelLink) {
        $productInfo = [];
        $link = $this->baseUrl . $secondLevelLink;
        $html_source = SHD::file_get_html($link);
        $PageContent = $html_source->find('div[class="PageContent"]',0);
        //echo $PageContent;
        if(!$PageContent) {
            return $productInfo;
        }
        $nameDom = $PageContent->find('h4',0);
        $name = $nameDom->text();
        $descriptionDom = $PageContent->find('h3',0);

        $description = $descriptionDom?$descriptionDom->text():"";
        $description = trim($description);

        $description = preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $description);
        //echo "description here we go:$description";
        $productInfo["description"] = $description;
        //echo $description."<br>";

        $listPDetail = $PageContent->find('div[class="listPDetail"]',0);
        $specifications = ($listPDetail && $listPDetail->find('ul',0)&&$listPDetail->find('ul',0)->find('li'))?$listPDetail->find('ul',0)->find('li'):[];
        $productInfo["specifications"] = [];
        foreach($specifications as $specification) {
            //echo $specification->text()."<br>";
            $productInfo["specifications"][] = $specification->text();
        }
        //echo $specifications."<br>";

        $productInfo["features"] = [];
        $features = $PageContent->find('div[class="listPDetail"]',1);
        if($features) {
        	$features = $features->find('li');
        	foreach($features as $feature) {
        		$productInfo["features"][] = $feature->text();
        	}
        }
        $tbForm = $PageContent->find('table[class="maxtable"]',0);
        $productInfo["detail"] = [];
        if($tbForm) {
            $tbForm = $tbForm->find('table',0);
            if($tbForm) {
                $trDoms = $tbForm->find('tr');
                
                foreach($trDoms as $trDom) {
                    $line = $trDom->find('td');
                    if($line && (count($line) >= 2)) {
                        $field = trim($line[0]->text());
                        $value = trim($line[1]->text());
                        //echo "field=$field,value=$value<br>";
                        $productInfo["detail"][] = [
                            "field" => $field,
                            "value" => $value
                        ];                    
                    }

                }                
            }

        }

        $productInfo["image"] = "";
        $imgProductDetail = $PageContent->find('div[class="imgProductDetail"]',0);

        if($imgProductDetail) {
            $image = $imgProductDetail->find('img',0)->src;
            //echo "image=$image<br>";

            $imageFile=Yii::$app->basePath."/web/products/image/$image";
            if(!file_exists($imageFile)) {
                $response = $client->createRequest()
                    ->setMethod('GET')
                    ->setUrl($this->baseUrl.$image)
                    ->send();                
                $fp = fopen($imageFile, 'w+');
                fwrite($fp, $response->content);
                fclose($fp);            
            }
           
            $productInfo["image"] = "/products/image".$image;
        }


        $download = $PageContent->find('span[class="download"]',0);
        $document = $download?$download->find('a',0)->href:"";

        $productInfo["document"] = "";
        if($document) {

            $pdfFile=Yii::$app->basePath."/web/products/pdf/$name.pdf";

            if(!file_exists($pdfFile)) {
                $response = $client->createRequest()
                    ->setMethod('GET')
                    ->setUrl($this->baseUrl.$document)
                    ->send();                
	            $fp = fopen($pdfFile, 'w+');
	            fwrite($fp, $response->content);
	            fclose($fp); 
	        }
            $productInfo["document"] = "/products/pdf/$name.pdf";            
        }

        return $productInfo;
    }

    public function saveCategory($parent_id,$name) {
        $category = new Category();
        if($parent_id > 0) {
            $category["parent_id"] = $parent_id;
        }
        $category["name"] = $name;
        $category->save();
        return $category["id"];
    }

    public function saveProduct($category_id,$productName,$productLink,$productInfo) {
        if(!$productInfo) {
            return;
        }
        $product = new Product();

        $product["category_id"] = $category_id;
        $product["name"] = $productName;
        $product["link"] = $productLink;
        $product["description"] = $productInfo["description"];
        $product["specifications"] = json_encode($productInfo["specifications"]);
        $product["detail"] = json_encode($productInfo["detail"]);
        $product["features"] = json_encode($productInfo["features"]);
        $product["image"] = $productInfo["image"];
        $product["document"] = $productInfo["document"];
        $product->save();
    }

	public function importFromSct() {
        $httpclient = new Client();
        /*
        $info = self::getProductInfo($httpclient,"/TTP111HDL.html");
        echo json_encode($info);
        return;
        */
        $html_source = SHD::file_get_html($this->baseUrl);
        //echo $html_source;
        $start = false;
        $productUl = $html_source->find('ul',2);
        if($productUl) {
            $lis = $productUl->children();
            foreach($lis as $li) {
                $parent_id = 0;
                $aLink = $li->find('a',0);
                $firstLevel = $aLink->title;
                /*
                echo $firstLevel."<br>";
                if($firstLevel == 'Power Converter / Power Center') {
                    $start = true;
                    continue;
                }
                if(!$start) {
                    continue;
                }
                */
                /*
                if(!in_array($firstLevel,['Surge Protector'])) {
                    continue;
                }
                echo "there we go\n";
                */
                $parent_id = self::saveCategory($parent_id,$firstLevel);
                $subUl = $li->find('ul',0);
                if($subUl) {
                    $subLis = $subUl->children();
                    foreach($subLis as $subLi) {
                        $aLink = $subLi->find('a',0);
                        $secondLevel = $aLink->title;
                        
                        $subSubUl = $subLi->find('ul',0);
                        if($subSubUl) {
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;".$secondLevel."<br>";
                            $second_id = self::saveCategory($parent_id,$secondLevel);
                            $subSubLis = $subSubUl->children();
                            foreach($subSubLis as $subSubLi) {
                                $aLink = $subSubLi->find('a',0);
                                $productName = $aLink->title;
                                $productLink = $aLink->href;
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$productName&nbsp;&nbsp;&nbsp;&nbsp;$productLink<br>";
                                $productInfo = self::getProductInfo($httpclient,$productLink);
                                //echo json_encode($productInfo)."<br>";
                                self::saveProduct($second_id,$productName,$productLink,$productInfo);

                            }                            
                        }
                        else {
                            $secondLevelLink = $aLink->href;
                            echo "$secondLevel$secondLevelLink\n";
                            $productInfo = self::getProductInfo($httpclient,$secondLevelLink);
                            //echo json_encode($productInfo)."<br>";
                            self::saveProduct($parent_id,$secondLevel,$secondLevelLink,$productInfo);
                        }

                    }                    
                }

            }
        }		
	}
}