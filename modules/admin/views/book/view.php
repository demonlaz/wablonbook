<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверины что хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,

        'attributes' => [
            'id',
            'parent_id',
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
            'urlbookpdf:url',
            'dataexit',
            'data_add',
            'urlbookfb2:url',
            'dowload',
        ],
    ]) ?>

</div>
