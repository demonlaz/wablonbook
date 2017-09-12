<?php

namespace app\controllers;

use app\models\Book;
use app\models\PoiskForm;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\RegistrForm;
use app\models\Category;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {

        $this->onlain();
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles'=>['@']
//                        'matchCallback'=>function($rule,$action){
//                            return Yii::$app->user->identity->login==='admin';
//                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
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

    public function  actionTest(){

        return $this->render('test');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $modelBook=Book::getDb()->cache(function($Book){
            return Book::find()
                ->orderBy('data_add' )
                ->indexBy('id')
                ->asArray()
                ->orderBy('data_add DESC')->limit(8)->all();
        },CACH_TIME);


        return $this->render('index',compact('modelBook'));
    }
    //экшен поиска
    public function actionPoisk(){
            $modelform=new PoiskForm();
        if($modelform->load(Yii::$app->request->post())&&$modelform->validate()){
            $modelBook=Book::getDb()->cache(function($Book){
                $a=Yii::$app->request->post('PoiskForm','нету');
                return  Book::find()->indexBy('id')->asArray()
                    ->where(['LIKE','namebook',$a['zapros']])
                    ->orWhere(['LIKE','avtor',$a['zapros']])->all();
            },CACH_TIME);


           return $this->render('poisk',compact('modelBook'));
        }
    }
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
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
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
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
    public function actionAbout($id=null)
    {
        if(is_numeric($id)){



            $modelBook=Book::getDb()->cache(function($Book){
                $id=Yii::$app->request->get('id');
                $otkCategory=  Category::findOne($id);
                return Book::find()
                     ->orderBy('data_add')
                     ->asArray()
                     ->indexBy('id')
                    ->where("parent_id=$otkCategory->id")
                    ->all();
            },CACH_TIME);

            return $this->render('about',compact('otkCategory','modelBook'));
        }else{
            return $this->redirect(['site/index']);
        }


    }
    public  function actionDowloadMy(){
        return Yii::$app->response->sendFile(
            Yii::getAlias('@webroot/imageBook/cherep.jpg'));
    }
    public function actionDowload($id=null){

        $pdfGet=Yii::$app->request->get('pdf');
        $fb2Get=Yii::$app->request->get('fb2');
        $rarGet=Yii::$app->request->get('rar');
            if($id!=null and isset($pdfGet) or isset($fb2Get) or isset($rarGet) and is_numeric($id)){
                $modelBook=Book::findOne($id);
                if(isset($pdfGet)){
                   $pdf=$modelBook->urlbookpdf;
                   $this->dowloadBook($id);

                   return $this->render('dowload',compact('pdf'));
                }elseif (isset($fb2Get)){
                    $fb2=$modelBook->urlbookfb2;
                    $this->dowloadBook($id);
//                    return $this->redirect([$fb2]);
                    return $this->render('dowload',compact('fb2'));
                    //return $this->render('dowload',compact('fb2'));
                 }elseif(isset($rarGet)){
                $rar=$modelBook->urlbookrar;
                $this->dowloadBook($id);

                return $this->render('dowload',compact('rar'));

            }else{
                    return $this->redirect(['site/index']);
                }


                //return $this->render('dowload');
            }
    }
    public function actionRegistr(){
        $form=New RegistrForm();
        if($form->load(yii::$app->request->post()  ) and $form->validate()){

            $form->recordBd();
            return $this->redirect(['site/login']);
        }
        return $this->render('registr',compact('form'));
    }


    public  function dowloadBook($id=null){
        if($id!=null) {
            $modelBook = Book::findOne($id);
            if ($modelBook) {
                $modelBook->dowload = $modelBook->dowload + 1;
//        $modelBook->dowload=$dowload;
                $modelBook->save();
            }
        }

    }




    /*
 * 17.07.15 12 05
 * отметка в две колонки
 * пользователй которые онлайн
 * onlain -string  dateEndEnter-integer
 * */
    protected  function onlain()
    {

        if (!Yii::$app->user->isGuest) {
            $user = \app\models\User::find()->where(['id' => Yii::$app->user->identity->id])->one();
            $user->dataEndEnter = time();

            $user->save();
            return true;
            // echo "<script >alert('{$date}') </script>";
        } else {
            return false;
        }
    }


}