<?php

namespace app\modules\admin\controllers;

use app\models\Category;
use Yii;
use app\models\Book;
use app\modules\admin\models\BookSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends Controller
{
    /**
     * @inheritdoc
     */

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => [],
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                       // 'roles'=>['?'],
                        'matchCallback'=>function($rule,$action){
                            return @Yii::$app->user->identity->powers==='admin';
                        }
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

//    public function behaviors()
//    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['POST'],
//                ],
//            ],
//        ];
//    }

    /**
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Book model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Book();
        $category= Category::getDb()->cache(function($category){
            return Category::find()->indexBy('id')->asArray()->all();
        },CACH_TIME);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             $model->uploadImage=UploadedFile::getInstance($model,'uploadImage');
            $path=Yii::$app->params['pathUploads'].'imageBook/';
            if(!empty($model->uploadImage->name)) {
                $model->imagesbook = $model->uploadImage->name;
                $model->save();

                
                $model->uploadImage->saveAs($path . $model->uploadImage);
            }
            return $this->redirect(['view', 'id' => $model->id,'category'=>$category]);
        } else {
            return $this->render('create', [
                'model' => $model,'category'=>$category
            ]);
        }
    }

    /**
     * Updates an existing Book model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $category= Category::getDb()->cache(function($category){
            return Category::find()->indexBy('id')->asArray()->all();
        },CACH_TIME);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->uploadImage=UploadedFile::getInstance($model,'uploadImage');
            $path=Yii::$app->params['pathUploads'].'imageBook/';
            if(!empty($model->uploadImage->name)) {
                $model->imagesbook = $model->uploadImage->name;
                $model->save();

                
                $model->uploadImage->saveAs($path . $model->uploadImage);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,'category'=>$category
            ]);
        }
    }

    /**
     * Deletes an existing Book model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}