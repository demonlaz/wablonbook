<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>


    <?php
    foreach ($category as $v){
        @$t[]=[$v[id]=>$v[name]];

    }
    echo $form->field($model,'parent_id')->dropDownList($t,['prompt'=>'Выберите категорию книги']);
    ?>

    <?= $form->field($model, 'namebook')->textInput(['maxlength' => true])->label('Название книги') ?>

    <?=$form->field($model,'uploadImage')->fileInput()->label('Загрузка обложки')?>

    <?= $form->field($model, 'avtor')->textInput(['rows' => 6])->label('Автор') ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6])->label('Содержание') ?>



    <?= $form->field($model, 'dataexit')->widget(DatePicker::classname(), [
        'language' => 'ru',
        'clientOptions' => [
          'dateFormat' => 'yy-mm-dd',
     ],
    ])?>

    <?= $form->field($model, 'urlbookpdf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'urlbookrar')->textInput(['maxlength' => true]) ?>





    <?= $form->field($model, 'urlbookfb2')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>