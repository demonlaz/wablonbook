<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\BookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'parent_id') ?>

    <?= $form->field($model, 'namebook') ?>

    <?= $form->field($model, 'avtor') ?>

    <?= $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'imagesbook') ?>

    <?php // echo $form->field($model, 'urlbookpdf') ?>

    <?php // echo $form->field($model, 'dataexit') ?>

    <?php // echo $form->field($model, 'data_add') ?>

    <?php // echo $form->field($model, 'urlbookfb2') ?>

    <?php // echo $form->field($model, 'dowload') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
