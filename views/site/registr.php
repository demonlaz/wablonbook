<?php

use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
//dumper($_SERVER['REMOTE_ADDR']);


?> 

<div class="left_content">
            <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>Регистрация</div>
        
        	<div class="feat_prod_box_details">

              	<div class="contact_form">
                <div class="form_subtitle">Создай свой акаунт</div>
<?php
$formaV=ActiveForm::begin([]);
?>
                <div class="form_row">
                    <label class="contact"><strong>Логин:</strong></label>  
<?=$formaV->field($form,'username')->textInput(['autofocus'=>true,"class"=>'contact_input'])->label(''); ?>
                </div>
                  <div class="form_row">
                    <label class="contact"><strong>Маил@:</strong></label>
<?=$formaV->field($form,'mail')->textInput(["class"=>'contact_input'])->label('');?>
                  </div>
                  <div class="form_row">
                    <label class="contact"><strong>Пароль:</strong></label>
<?=$formaV->field($form,'pass1')->passwordInput(["class"=>'contact_input'])->label('');?>
                  </div>
                  <div class="form_row">
                    <label class="contact"><strong>Повторить пароль:</strong></label>
<?=$formaV->field($form,'pass2')->passwordInput(["class"=>'contact_input'])->label('');?>

                  </div>
                <div class="form_row">
                    <label class="contact"><strong>Код от ботов:</strong></label>
                <?=$formaV->field($form, 'captcha')->widget(Captcha::classname(), ['class'=>'contact_input']) ;?>
                </div>
<div>

    <button type="submit" class="btn btn-success">Зарегистрироватся</button>

</div>

<?php

ActiveForm::end();

?>
                </div>
</div>

                    
</div>

            
        <!--<div class="clear"></div>-->
        <!--end of left content-->
