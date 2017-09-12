<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\admin\models\BookSearch;
use app\models\Book;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить книгу', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Войти в раздел Категории', ['category/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Войти в раздел Новости', ['news/index'], ['class' => 'btn btn-primary']) ?>
    </p>
<?php Pjax::begin();

?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=>[
            'class'=>'table panel-body',
            'style'=>'background: #9d9d9d;font-size: medium ;'
        ],
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'parent_id',
                'label'=>'Категория',
                'format'=>'text', // Возможные варианты: raw, html
                'content'=>function($data){
                    return $data->getParentName();
                },
                'filter' =>BookSearch::getParentsList()

            ],
            'namebook',
            'avtor:ntext',
            'content:ntext',
            [
                    'label'=>'Обложка',
                    'format'=>'raw',
                    'value'=>function($data){

                        return Html::img('\web\imageBook\\'.$data->imagesbook,['alt'=>'нет картинки',
                            'style'=>'width:100px;height:100px'

                        ]);
                    }
            ],
            // 'imagesbook',
            // 'urlbookpdf:url',
            'dataexit',
    ['attribute'=>'data_add',
        'label'=>'Дата добавления книги'],
            // 'urlbookfb2:url',
            // 'dowload',





            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Действие'
                ],
        ],
    ]); ?>
<?php
Pjax::end();
?>

</div>