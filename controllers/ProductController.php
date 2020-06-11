<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use app\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\services\DatabaseUtil;
use yii\web\UploadedFile;
use yii2tech\csvgrid\CsvGrid;
use yii\data\ArrayDataProvider;
use yii\data\ActiveDataProvider;

class ProductDetailItem {
    public function __construct($field, $value) {
        $this->field = $field;
        $this->value = $value;
    }    
}
/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    public $layout = 'admin';
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

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dbUtil = new DatabaseUtil();
        $settingArray = $dbUtil->getSettings();

        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'settings' => $settingArray
        ]);
    }

    public function actionReloadall() {
        $dbUtil = new DatabaseUtil();
        $products = $dbUtil->getProducts(["all" => true]);
        foreach($products as $product) {
            $id = $product["id"];
            self::actionReload($id);
        }
    }

    public function actionReloadnews() {
        $dbUtil = new DatabaseUtil();
        $products = $dbUtil->reloadNews();
        return self::actionIndex();
    }


    /**
     * Displays a single Product model.
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

    public function actionExport() {
        
        $exporter = new CsvGrid([
            'dataProvider' => new ActiveDataProvider([
                'query' => Product::find(),
            ]),
        ]);
        return $exporter->export()->send('products.csv'); 
           
    }

    public function actionReload($id) {
        $dbUtil = new DatabaseUtil();
        $dbUtil->reloadProductFromSct($id);    
            
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);   
             
    }
    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $detailArray = [""];
        $model->detail = json_encode($detailArray);
        $specificationsArray = ["",""];
        $model->specifications = json_encode($specificationsArray);
        $post = Yii::$app->request->post();
        if ($model->load($post)) {
            $model = $this->updateModelFields($model, $post);
            if ($model->upload()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }        

        
        return $this->render('create', [
            'model' => $model,
        ]);
        
        
    }

    private function updateModelFields($model, $post) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->imageFile1 = UploadedFile::getInstance($model, 'imageFile1');
            $model->imageFile2 = UploadedFile::getInstance($model, 'imageFile2');
            $model->imageFile3 = UploadedFile::getInstance($model, 'imageFile3');
            $model->imageFile4 = UploadedFile::getInstance($model, 'imageFile4');
            $model->imageFile5 = UploadedFile::getInstance($model, 'imageFile5');
            $model->documentFile = UploadedFile::getInstance($model, 'documentFile');

            $fields = $post["detail_field"];
            $values = $post["detail_value"];
            if($fields && $values) {
                $details = [];
                for($i=0;$i<count($fields);$i++) {
                    $field = $fields[$i];
                    $value = $values[$i];
                    if($field || $value) {
                        $item = new ProductDetailItem($field, $value);
                        array_push($details, $item);                        
                    }
                }
                $model->detail = json_encode($details);                
            }

            $specification_field = $post["specification_field"];
            if($specification_field) {
                $specifications = [];
                for($i=0;$i<count($specification_field);$i++) {
                    $item = $specification_field[$i];
                    if($item) {
                        array_push($specifications, $item);
                    }
                    
                }
                $model->specifications = json_encode($specifications);                   
            }
            return $model;
    }
    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $post = Yii::$app->request->post();
        if ($model->load($post)) {
            $model = $this->updateModelFields($model, $post);
            if ($model->upload()) {

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }   

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
