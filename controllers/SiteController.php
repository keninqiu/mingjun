<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\services\DatabaseUtil;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionIndex()
    {
        $dbUtil = new DatabaseUtil();
        $condArray = [];
        $condArray["new"] = 1;  
        $products = $dbUtil->getProducts($condArray);
        $settingArray = $dbUtil->getSettings();
        return $this->render('index',[
            'products' => $products,
            'settings' => $settingArray
        ]);
    }

    public function actionSearch() {
        $dbUtil = new DatabaseUtil();
        $settingArray = $dbUtil->getSettings();
        $categories = $dbUtil->getCategories();
        $request = Yii::$app->request;
        $category_id = $request->get('category_id');
        $text = $request->get('text');

        $condArray = [];
        if($category_id) {
            $condArray["category_id"] = $category_id;           
        }
        if($text) {
            $condArray["text"] = $text;     
        }
        $products = $dbUtil->getProducts($condArray);
        
        return $this->render('search',[
            'categories' => $categories,
            'products' => $products,
            'settings' => $settingArray
        ]);
        
    }

    public function actionProduct() {
        $dbUtil = new DatabaseUtil();
        $settingArray = $dbUtil->getSettings();
        $request = Yii::$app->request;
        $product_name = $request->get('name');   
        $details = $dbUtil->getProductDetails($product_name);   
        $similar_products = $dbUtil->getSimilar($product_name);
        $product = $details["product"];
        return $this->render('product',[
            'details' => $details,
            'similar_products' => $similar_products,
            'settings' => $settingArray
        ]);      
    }

    public function actionNews() {
        $dbUtil = new DatabaseUtil();
        $settingArray = $dbUtil->getSettings();
        return $this->render('news',[
            'settings' => $settingArray
        ]); 
    }

    public function actionFaq() {
        $dbUtil = new DatabaseUtil();
        $settingArray = $dbUtil->getSettings();
        return $this->render('faq',[
            'settings' => $settingArray
        ]); 
    }

    public function actionSolution() {
        $dbUtil = new DatabaseUtil();
        $settingArray = $dbUtil->getSettings();
        return $this->render('solution',[
            'settings' => $settingArray
        ]); 
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $dbUtil = new DatabaseUtil();
        $settingArray = $dbUtil->getSettings();        
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //echo "haha";
            return $this->redirect('/category');
        }
        
        else {
            return $this->render('login', [
                'model' => $model,
                'settings' => $settingArray
            ]);
        }
        
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $dbUtil = new DatabaseUtil();
        $settingArray = $dbUtil->getSettings();        
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
            'settings' => $settingArray
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $dbUtil = new DatabaseUtil();
        $settingArray = $dbUtil->getSettings();
        return $this->render('about',[
            'settings' => $settingArray
        ]);
    }
}
