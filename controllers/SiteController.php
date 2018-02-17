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
        /*
        $dbUtil = new DatabaseUtil();
        $categories = $dbUtil->getCategories();
        return $this->render('index',[
            'categories' => $categories
        ]);
        */
        return self::actionSearch();
    }

    public function actionSearch() {
        $dbUtil = new DatabaseUtil();
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
            'products' => $products
        ]);
        
    }

    public function actionProduct() {
        $dbUtil = new DatabaseUtil();
        $request = Yii::$app->request;
        $product_id = $request->get('id');   
        $details = $dbUtil->getProductDetails($product_id);    

        return $this->render('product',[
            'details' => $details
        ]);      
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //echo "haha";
            return $this->redirect('dashboard');
        }
        
        else {
            return $this->render('login', [
            'model' => $model,
            ]);
        }
        
    }


    public function actionDashboard() {
        return $this->render('dashboard');
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
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
