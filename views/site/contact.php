<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="left_content">
      <div class="title"><span class="title_icon"><img src="/images/bullet1.gif" alt="" title="" /></span>Форма обратной связи</div>
      
<div class="feat_prod_box_details">
     <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
           Сообщение успешно отправлено.Спасибо!
        </div>
      
      <?php endif; ?>
<div class="contact_form">
                <div class="form_subtitle">Отписаться разработчику</div>    

   

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
<div class="form_row">
                    <label class="contact"><strong>Имя:</strong></label>
                    <?= $form->field($model, 'name')->textInput(['autofocus' => true,'class'=>'contact_input'])->label('') ?>
                    </div>
<div class="form_row">
                    <label class="contact"><strong>Ваш Mail:</strong></label>
                    <?= $form->field($model, 'email')->textInput(['class'=>'contact_input'])->label('') ?>
                    </div>
<div class="form_row">
                    <label class="contact"><strong>Тема:</strong></label>
                   
                    <?= $form->field($model, 'subject')->textInput(['autofocus' => true,'class'=>'contact_input'])->label('') ?>
                    </div>
<div class="form_row">
                    <label class="contact"><strong>Содержание:</strong></label>
                    <?= $form->field($model, 'body')->textarea(['rows' => 6,'class'=>'contact_textarea'])->label('') ?>
                    </div>
<div class="form_row">
                    <label class="contact"><strong>Анти бот:</strong></label>
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                       // 'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ])->label('') ?>
</div>
                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'contact', 'name' => 'contact-button','style'=>'width:100%;']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
            </div>
        </div>







 
        