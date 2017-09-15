<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Book;
use yii\base\DynamicModel;
use yii\helpers\Url;

class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
    public function actions() {
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
    public function actionIndex() {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact() {
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
    public function actionAbout() {
        return $this->render('about');
    }

    /**
     * вывод конкретной книги по id
     *
     * @return string
     */
    public function actionBook($id = 1) {
        $model = DynamicModel::validateData(compact('id'), [
                    [['id'], 'integer', 'min' => 1],
        ]);

        if ($model->hasErrors()) {
            return $this->render('error');
        } else {
          
              
                $modelBook= Book::find()->indexBy("id")->asArray()->where('id=:id', [':id' => $id])->all();
          
                
        
            return $this->render('book', compact('modelBook'));
        }
    }

    public function actionCategory($id=1) {
  
        $model = DynamicModel::validateData(compact('id'), [
                    [['id'], 'integer', 'min' => 1],
        ]);

        if ($model->hasErrors()) {
            return $this->render('error');
        } else {
            $category= \app\models\category::find()->where('id=:id',[':id'=>$id])->select('name')->one();
            $model = Book::find()->indexBy("id")->asArray()->where('parent_id=:parent_id', [':parent_id' => $id]);
            
            $pagin=new \yii\data\Pagination(['totalCount'=>$model->count(),"pageSize"=>10]);
                    
                     $pagin->pageSizeParam = false;

            $modelBook = Book::find()->offset($pagin->offset)->limit($pagin->limit)->where('parent_id=:parent_id', [':parent_id' => $id])->all();
            
            return $this->render('category', compact('modelBook','pagin','category'));
        }
    }

    public static function getYandex() {
        $yandex = Yii::$app->db->createCommand('SELECT * FROM yandex_shet WHERE id=1')->queryOne();

        return $yandex['yandex'];
    }

}
