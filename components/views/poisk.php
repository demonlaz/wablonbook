<?php/** * Created by PhpStorm. * User: demon * Date: 16.05.2017 * Time: 20:26 */use yii\bootstrap\ActiveForm;?><?php $form=ActiveForm::begin(['method'=>'post','action'=>['site/poisk']]) ?><div class="col-lg-6">    <div class="input-group">        <?=$form->field($modelform,'zapros')->input(['class'=>'form-control'])?>        <span class="input-group-btn">             <?= \yii\helpers\Html::submitButton('<i class="glyphicon glyphicon-search"></i>',                 ['class' => 'btn btn-default',                     'name' => 'zapros-button',                     'style'=>'margin-top: -35px;height:33px']) ?>      </span>    </div><!-- /input-group --></div><!-- /.col-lg-6 --><?php ActiveForm::end(); ?>