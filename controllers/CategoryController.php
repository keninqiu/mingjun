<?php

namespace app\controllers;

use Yii;
use app\models\Category;
use app\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use keltstr\simplehtmldom\SimpleHTMLDom as SHD;
/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
{
    public $layout = 'admin';
    private $baseUrl = "http://www.sct.com.tw";
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function getProductInfo($secondLevelLink) {
        $productInfo = [];
        $link = $this->baseUrl . $secondLevelLink;
        $html_source = SHD::file_get_html($link);
        $PageContent = $html_source->find('div[class="PageContent"]',0);
        //echo $PageContent;
        $descriptionDom = $PageContent->find('h3',0);
        $description = $descriptionDom->find('p',0);
        $description = $description->text();
        //echo $description."<br>";

        $listPDetail = $PageContent->find('div[class="listPDetail"]',0);
        $specifications = $listPDetail->find('ul',0)->outertext;
        //echo $specifications."<br>";

        $tbForm = $PageContent->find('table[class="tbForm"]',0);
        $trDoms = $tbForm->find('tr');
        foreach($trDoms as $trDom) {
            $line = $trDom->find('p');
            $field = $line[0]->text();
            $value = $line[1]->text();
            echo "field=$field,value=$value<br>";
        }

        $imgProductDetail = $PageContent->find('div[class="imgProductDetail"]',0);
        $image = $imgProductDetail->find('img',0)->src;
        echo "image=$image<br>";

        $download = $PageContent->find('span[class="download"]',0);
        $document = $download->find('img',0)->src;
        echo "document=$document<br>";

        return $productInfo;
    }

    public function actionImport() {
        self::getProductInfo("/TTP111HDP.html");
        return;
        $html_source = SHD::file_get_html($this->baseUrl);
        //echo $html_source;
        $productUl = $html_source->find('ul',2);
        if($productUl) {
            $lis = $productUl->children();
            foreach($lis as $li) {
                $aLink = $li->find('a',0);
                $firstLevel = $aLink->title;
                echo $firstLevel."<br>";
                $subUl = $li->find('ul',0);
                if($subUl) {
                    $subLis = $subUl->children();
                    foreach($subLis as $subLi) {
                        $aLink = $subLi->find('a',0);
                        $secondLevel = $aLink->title;
                        
                        $subSubUl = $subLi->find('ul',0);
                        if($subSubUl) {
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;".$secondLevel."<br>";
                            $subSubLis = $subSubUl->children();
                            foreach($subSubLis as $subSubLi) {
                                $aLink = $subSubLi->find('a',0);
                                $productName = $aLink->title;
                                $productLink = $aLink->href;
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$productName&nbsp;&nbsp;&nbsp;&nbsp;$productLink<br>";
                                $productInfo = self::getProductInfo($productLink);
                                echo json_encode($productInfo)."<br>";

                            }                            
                        }
                        else {
                            $secondLevelLink = $aLink->href;
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;$secondLevel&nbsp;&nbsp;&nbsp;&nbsp;$secondLevelLink<br>";
                            $productInfo = self::getProductInfo($secondLevelLink);
                            echo json_encode($productInfo)."<br>";
                        }

                    }                    
                }

            }
        }
        /*
        $subMenuDom = $html_source->find('a');
        $isProductLink = false;
        foreach($subMenuDom as $item) {
            if($item && $item->title) {
                $title = $item->title;
                if($title == "Products") {
                    $isProductLink = true;
                    continue;
                }
                else if($title == "Solutions") {
                    $isProductLink = false;
                }
                if($isProductLink) {
                    echo $title."<br>";
                }

                
            }
        }
        */
    }
    
    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
