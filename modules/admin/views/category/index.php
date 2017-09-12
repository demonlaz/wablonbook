<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\admin\models\CategorySearch;
use app\models\Janri;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Войти в раздел Книги', ['book/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Войти в раздел Новости', ['news/index'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=>[
            'class'=>'table panel-body',
            'style'=>'background: #9d9d9d;font-size: medium ;'
        ],
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name:ntext',
            [
                'attribute'=>'id_janri',
                'label'=>'Жанры',

                'format'=>'text', // Возможные варианты: raw, html
                'content'=>function($data){
                    return $data->getParentName();
                },
                'filter' =>CategorySearch::getParentsList(),


            ],


            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Действие',
                ],
        ],
    ]); ?>
</div>
