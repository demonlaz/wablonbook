<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>


    <label>Тема</label>
    <?= yii\imperavi\Widget::widget([
    // You can either use it for model attribute
    'model' => $model,
    'attribute' => 'title',


    // or just for input field
    //'name' => 'title',

    // Some options, see http://imperavi.com/redactor/docs/
    'options' => [
        'lang' => 'ru',
    'toolbar' => true,
    'css' => 'wym.css',
    ],
        'plugins' => [
            'fullscreen',

        ]
    ]);?>


    <label>Содежание</label>
    <?= yii\imperavi\Widget::widget([
        // You can either use it for model attribute
        'model' => $model,
        'attribute' => 'content',
        // or just for input field
        //'name' => 'title',
        // Some options, see http://imperavi.com/redactor/docs/
        'options' => [
            'lang' => 'ru',
            'toolbar' => true,
            'css' => 'wym.css',
        ],
        'plugins' => [
            'fullscreen',

        ]
    ]);?>
    <?php
    if(!$model->isNewRecord ){

        echo $form->field($model,'avtor')->input('text');
    }

    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
