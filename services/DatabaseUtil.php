<?php
namespace app\services;
use Yii;
use yii\httpclient\Client;
use keltstr\simplehtmldom\SimpleHTMLDom as SHD;
use app\models\Category;
use app\models\Product;
use app\models\Setting;

class DatabaseUtil
{
	private $baseUrl = "http://www.sct.com.tw";

    function startsWith($haystack, $needle) {
        // search backwards starting from haystack length characters from the end
        return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
    }

    function endsWith($haystack, $needle) {
        // search forward starting from end minus needle length characters
        return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
    }

    public function loadSolution() {
        $client = new Client();
        $link = $this->baseUrl . "/supplier_technology.html";
        $html_source = SHD::file_get_html($link);
        $links = $html_source->find('a');
        foreach($links as $link) {
            $href = $link->href;
            if(self::startsWith($href,"http://www.shetech.com.tw/solutions/") || self::startsWith($href,"HTTP://www.shetech.com.tw/solutions/")) {
                echo "href=$href\n";
                $array = explode("/", $href);
                $name = $array[count($array) - 1];
                $name = str_replace("%20", " ", $name);
                $name = str_replace("&amp;", "&", $name);
                $name = str_replace("&ndash;", "-", $name);
                
                $href = str_replace(" ", "%20", $href);
                $pdfFile=Yii::$app->basePath."/web/solutions/$name";

                if(!file_exists($pdfFile)) {
                    $response = $client->createRequest()
                        ->setMethod('GET')
                        ->setUrl($href)
                        ->send();                
                    $fp = fopen($pdfFile, 'w');
                    fwrite($fp, $response->content);
                    fclose($fp); 
                }                
            }
        }
    }

    public function reloadNews() {
        $client = new Client();
        $link = $this->baseUrl . "/supplier_news.html";
        $html_source = SHD::file_get_html($link);
        $aLinks = $html_source->find('a');
        $category_id = 80;
        foreach($aLinks as $aLink) {
            $href = $aLink->href;
            
            if(self::startsWith($href,"http://www.sct.com.tw/") && self::endsWith($href,".html")) {
                
                $array = explode("/",$href);
                $fileName = $array[count($array) - 1];
                
                $array = explode(".",$fileName);
                $productName = $array[0];
                

                $product = Product::find()->where(["name" => $productName])->one();
                
                if(!$product) {
                    //echo "productName=$productName\n";
                    $productLink = "/" . $fileName;
                    $productInfo = self::getProductInfo($client,$productLink);
                    self::saveProduct($category_id,$productName,$productLink,$productInfo);  
                }
            }
        }
    }

    public function getSettings() {
        $settings = Setting::find()->all();
        $settingArray = [];
        foreach($settings as $setting) {
            $field = $setting["field"];
            $value = $setting["value"];
            $settingArray[$field] = $value;
        }
        return $settingArray;
    }

    public function getProductDetails($name) {

        $product = Product::find()->where(["name" => $name])->one();
        $category_id = $product["category_id"];
        $category = Category::find()->where(["id" => $category_id])->one();
        $ret = [
            "product" => $product,
            "category" => $category
        ];
        if($category["parent_id"]) {
            $parent_category = Category::find()->where(["id" => $category["parent_id"]])->one();
            $ret["parent_category"] = $parent_category;
        }
        return $ret;
    }

    public function getSimilar($name) {
        $product = Product::find()->where(["name" => $name])->one();
        $category_id = $product["category_id"];
        $products = Product::find()->where(["category_id" => $category_id])->all();
        $similar_products = [];
        $i = 0;
        foreach($products as $item) {
            $item_name = $item["name"];
            if($name == $item_name) {
                continue;
            }
            $i ++;
            if($i > 9) {
                break;
            }
            $similar_products[] = $item;
        }
        return $similar_products;
    }

    public function getProducts($condArray=[]) {

        $productSearch = Product::find();
        if($condArray) {
            if(isset($condArray["category_id"])) {
                $category_id = $condArray["category_id"];
                $sub_categories = Category::find()->where(["parent_id" => $category_id])->all();
                if($sub_categories) {
                    $products = [];
                    foreach($sub_categories as $subitem) {
                        $sub_category_id = $subitem["id"];
                        $condArray["category_id"] = $sub_category_id;
                        $products = array_merge($products,self::getProducts($condArray));
                    }
                    return $products;
                }
                else {
                    $productSearch = $productSearch->andWhere(["category_id" => $category_id]);
                }
            }
            if(isset($condArray["text"])) {
                $text = $condArray["text"];
                $productSearch = $productSearch->andWhere(
                    ['or', ['like', 'name', $text], ['like', 'description', $text], ['like', 'specifications', $text], ['like', 'detail', $text]]);
            }
            if(isset($condArray["new"])) {
                $productSearch = $productSearch->andWhere(["new" => $condArray["new"]]);
            }
        }
        if(!$condArray) {
            $productSearch = $productSearch->limit(12);
        }        
        $products = $productSearch->all();
        
        return $products;
    }

    function replace_unicode_escape_sequence($match) {
        return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
    }
    public function unicode_decode($str) {
        return preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'self::replace_unicode_escape_sequence', $str);
    }

    public function getCategory($category_id) {
        $category = Category::find()->where(["id" => $category_id])->one();
        return $category;
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
        $titleDom = $html_source->find('title',0);
        $title = $titleDom?$titleDom->text():"";
        $title = str_replace("Smart Cabling & Transmission Corp.","FORESIGHT CCTV Inc.",$title);
        $productInfo["title"] = $title;



        $PageContent = $html_source->find('div[class="PageContent"]',0);
        //echo $PageContent;
        if(!$PageContent) {
            return $productInfo;
        }
        $nameDom = $PageContent->find('h4',0);
        $name = $nameDom->text();

        $meta_keywordsDom = $html_source->find('meta[name="keywords"]',0);
        $meta_keywords = $meta_keywordsDom?$meta_keywordsDom->content:"";

        $meta_keywords = preg_replace('/[\x00-\x1F\x7F-\xFF\xEF\xBB\xBF]/', '', $meta_keywords);
        $meta_keywords = self::unicode_decode($meta_keywords);

        $productInfo["meta_keywords"] = $meta_keywords;
        //$meta_descriptionDom = $html_source->find('meta[name="description"]',0);
        //$meta_description = $meta_descriptionDom?$meta_descriptionDom->content:"";    
        $productInfo["meta_description"] = "The $name is offered by FORESIGHT CCTV Inc., a leader leading professional CCTV manufacturer in th field of CCTV Security Products.We design, develop and manufacture a full range of CCTV & IP Smart Cabling products on Twisted Pair Transmission, IP Cabling Transmission, CAT5 VGA Transmission, Data Transmission, Coaxial Cabling system for Video Distributor & Amplifier, Surge Protector, Solution Provider for Video Interference, Power Center, other accessories...etc.";

        $descriptionDom = $PageContent->find('h3',0);

        $description = $descriptionDom?$descriptionDom->text():"";
        $description = trim($description);

        $description = preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $description);
        $description = self::unicode_decode($description);
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
        if(!$imgProductDetail) {
            $imgProductDetail = $PageContent->find('a',0);
        }
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
        $category = Category::find()->where(["name" => $name])->one();
        if($category) {
            return $category["id"];
        }

        $category = new Category();
        if($parent_id > 0) {
            $category["parent_id"] = $parent_id;
        }
        $category["name"] = $name;
        $category->save();
        return $category["id"];
    }

    public function reloadProductFromSct($id) {
        $client = new Client();
        $product = Product::find()->where(["id" => $id])->one();
        if(!$product) {
            echo "no product,return\n";
            return;
        }

        $productLink = $product["link"];
        $productInfo = self::getProductInfo($client,$productLink);
        echo json_encode($productInfo)."\n";
        self::saveProduct($product["category_id"],$product["name"],$product["link"],$productInfo);            
    }

    public function saveProduct($category_id,$productName,$productLink,$productInfo) {

        $product = Product::find()->where(["name" => $productName])->one();
        if($product) {
            $productId = $product["id"];
            $categoryId = $product["category_id"];
            //echo "product existed with id:$productId,category_id=$category_id,categoryId=$categoryId\n";
            if(!$categoryId && ($category_id > 0)) {
                $product["category_id"] = $category_id;
            }
        }
        else {
            $product = new Product();
            $product["category_id"] = $category_id;  
            $product["name"] = $productName;
            $product["link"] = $productLink;                      
        }

        if($productInfo["title"]) {
            $product["title"] = $productInfo["title"];
        }

        if($productInfo["meta_keywords"]) {
            $product["meta_keywords"] = $productInfo["meta_keywords"];
        }

        if($productInfo["meta_description"]) {
            $product["meta_description"] = $productInfo["meta_description"];
        }

        if($productInfo["description"]) {
            $product["description"] = $productInfo["description"];
        }
        
        if($productInfo["specifications"]) {
            $product["specifications"] = json_encode($productInfo["specifications"]);
        }
        
        if($productInfo["detail"]) {
            $product["detail"] = json_encode($productInfo["detail"]);
        }
        
        if($productInfo["features"]) {
            $product["features"] = json_encode($productInfo["features"]);
        }
        
        if($productInfo["image"]) {
            $product["image"] = $productInfo["image"];
            //echo "image is:".$product["image"]."\n";
        }
        
        if($productInfo["document"]) {
            $product["document"] = $productInfo["document"];
        }
        
        $product->save(false);
        //echo "image 2 is:".$product["image"]."\n";
    }

    public function parseCategoryLink($client,$category_id,$category_link) {
        $link = $this->baseUrl . $category_link;
        $html_source = SHD::file_get_html($link);
        $boxProductBlk = $html_source->find('div[class="boxProductBlk"]');
        foreach($boxProductBlk as $boxProduct) {
            $productDom = $boxProduct->find('a',1);
            if($productDom) {
                $productLink = $productDom->href;
                $productName = $productDom->text();
                $productInfo = self::getProductInfo($client,$productLink);
                self::saveProduct($category_id,$productName,$productLink,$productInfo);                
            }

        }
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
                if(!in_array($firstLevel,['Composite Video / Component VideoTransmission'])) {
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
                            echo $secondLevel."\n";
                            /*
                            if(!in_array($secondLevel,['Analog Video CCTV Twisted Pair Transmission'])) {
                                continue;
                            }
                            */
                            $second_id = self::saveCategory($parent_id,$secondLevel);
                            echo "second_id=$second_id\n";
                            $subSubLis = $subSubUl->children();
                            foreach($subSubLis as $subSubLi) {
                                $aLink = $subSubLi->find('a',0);
                                $threeLevel = $aLink->title;
                                $subSubSubUl = $subSubLi->find('ul',0);
                                if($subSubSubUl) {
                                    echo "threeLevel=$threeLevel\n";
                                    $three_id = self::saveCategory($second_id,$threeLevel);
                                    $subSubSubLis = $subSubSubUl->children();
                                    foreach($subSubSubLis as $subSubSubLi) {
                                        $aLink = $subSubSubLi->find('a',0);
                                        $fourLevel = $aLink->title;
                                        $subSubSubSubUl = $subSubSubLi->find('ul',0);
                                        if($subSubSubSubUl) {
                                            echo "fourLevel=$fourLevel\n";
                                            $four_id = self::saveCategory($three_id,$fourLevel);
                                            $subSubSubSubLis = $subSubSubSubUl->children();
                                            foreach($subSubSubSubLis as $subSubSubSubLi) {
                                                $aLink = $subSubSubSubLi->find('a',0);
                                                $categoryLink = $aLink->href;
                                                $fiveLevel = $aLink->title;
                                                $subSubSubSubSubUl = $subSubSubSubLi->find('ul',0);
                                                if($subSubSubSubSubUl) {
                                                    echo "fiveLevel=$fiveLevel\n";
                                                    $five_id = self::saveCategory($four_id,$fiveLevel);
                                                    self::parseCategoryLink($httpclient,$five_id,$categoryLink);
                                                }
                                                else {
                                                    $productName = $aLink->title;
                                                    $productLink = $aLink->href;
                                                    echo "$productName;$productLink\n";
                                                    $productInfo = self::getProductInfo($httpclient,$productLink);
                                                    //echo json_encode($productInfo)."<br>";
                                                    self::saveProduct($four_id,$productName,$productLink,$productInfo);
                                                }

                                                                                                
                                            }
                                        }                                        
                                    }
                                }
                                else {
                                    
                                    $productName = $aLink->title;
                                    $productLink = $aLink->href;
                                    echo "productName=$productName;productLink=$productLink\n";
                                    $productInfo = self::getProductInfo($httpclient,$productLink);
                                    //echo "productInfo=".json_encode($productInfo)."\n";
                                    self::saveProduct($second_id,$productName,$productLink,$productInfo);
                                                                     
                                }

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