<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'name')->textinput(['rows' => 6]) ?>

    <?php
    foreach ($janri as $v){
        @$t[]=[$v[id]=>$v[name]];

    }
    echo $form->field($model,'id_janri')->dropDownList($t,['prompt'=>'Выберите к какому жанру принадлежит']);
    ?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добваить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>