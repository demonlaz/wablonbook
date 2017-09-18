<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
//dumper($_SERVER['REMOTE_ADDR']);

$this->title='Регистрация';
?> 

<div class="left_content">
            <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>Регистрация</div>
        
        	<div class="feat_prod_box_details">

              	<div class="contact_form">
                <div class="form_subtitle">Создай свой акаунт</div>
<?php
$form=ActiveForm::begin([ 
//    'id' => 'registration-form',
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false]);
?>
                <div class="form_row">
                    <label class="contact"><strong>Логин:</strong></label>  
<?=$form->field($model, 'username')->textInput(['autofocus'=>true,"class"=>'contact_input'])->label(''); ?>
                </div>
                  <div class="form_row">
                    <label class="contact"><strong>Маил@:</strong></label>
<?=$form->field($model, 'email')->textInput(["class"=>'contact_input'])->label('');?>
                  </div>
                  <div class="form_row">
                    <label class="contact"><strong>Пароль:</strong></label>
                     <?php if ($module->enableGeneratingPassword == false): ?>
<?=$form->field($model, 'password')->passwordInput(["class"=>'contact_input'])->label('');?>
                     <?php endif ?>
                  </div>
                
              
<div>

     <?= Html::submitButton(Yii::t('user', 'Регистрироватся'), ['class' => 'register', 'name' => 'login-button','style'=>'width:100%;']) ?>

</div>

<?php

ActiveForm::end();

?>
                 <p class="text-center">
            <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>
        </p>
                </div>
</div>

                    
</div>

            
        <!--<div class="clear"></div>-->
        <!--end of left content-->

        