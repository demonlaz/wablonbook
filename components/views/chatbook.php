<?php
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 30.05.2017
 * Time: 15:53
 */

use yii\helpers\Html;

use yii\widgets\ActiveForm;
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading" id="accordion">
                    <span class="glyphicon glyphicon-comment">  Комментарии к книге</span>
                    <div class="btn-group pull-right">
                        <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                    </div>
                </div>
                <div class="panel-collapse collapse" id="collapseOne">
                    <div class="panel-body">
                        <ul class="chat">
                            <?php foreach ($modelChat as $v){?>
                                <li class="left clearfix"><span class="chat-img pull-left">
                             <i  alt="User Avatar" class="glyphicon glyphicon-user" /></i>
                        </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font" style="color: #ffa000;font-weight:800"><?=Html::encode($v['login'])?>
                                            </strong> <small class="pull-right text-muted">
                                                <span class="glyphicon glyphicon-time"></span><?=Html::encode($v['datetime']); ?></small>
                                        </div>
                                        <p>
                                            <?=Html::encode($v['text'])?>
                                        </p>
                                    </div>
                                </li>
                            <?php  } ?>

                        </ul>
                    </div>
                    <div class="panel-footer">
                    
                        <?php
                        $form=ActiveForm::begin(['method'=>'post','action'=>['book/chat']

                        ]) ?>
                        <div class="input-group">
                            <?=$form->field($model,'content')->input(['class'=>'form-control input-sm',
                                'id'=>'btn-input','placeholder'=>'Оставте свои комментарии....'])?>
                            <span class="input-group-btn">
                            <?= \yii\helpers\Html::submitButton('Отправить',
                                ['class' => 'btn btn-warning btn-sm', 'name' => 'zaprosbutton','id'=>'btn-chat','style'=>'height:34px']) ?>
                                <p> </p>
                                <?php if(@Yii::$app->user->identity->powers!=="admin"){
                                    echo $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::classname(), []) ;
                                }
                                echo $form->field($model,'idbook')->hiddenInput(['value'=>$idbook])->label(false);
                                ?>
                        </span>
                        </div>
                        <?php //}
                        ActiveForm::end();
                        ?>
                    </div><!--     footer-->

                </div>
            </div>
        </div>
    </div>
</div>