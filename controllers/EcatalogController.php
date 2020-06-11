<?php

namespace app\controllers;

use Yii;
use app\models\Ecatalog;
use app\models\EcatalogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * EcatalogController implements the CRUD actions for Ecatalog model.
 */
class EcatalogController extends Controller
{
    public $layout = 'admin';
    /**
     * {@inheritdoc}
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
     * Lists all Ecatalog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EcatalogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ecatalog model.
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
     * Creates a new Ecatalog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ecatalog();

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

    /**
     * Updates an existing Ecatalog model.
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


    private function updateModelFields($model, $post) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            return $model;
    }

    /**
     * Deletes an existing Ecatalog model.
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
     * Finds the Ecatalog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ecatalog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ecatalog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
