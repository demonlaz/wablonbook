<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = 'Обновить книгу: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Книга', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' =>'Книга с id='.$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'category'=>$category
    ]) ?>

</div>
