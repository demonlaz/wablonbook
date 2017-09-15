<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="left_content">
    <div class="title"><span class="title_icon"><img src="/images/bullet1.gif" alt="" title="" /></span>Вход</div>

    <div class="feat_prod_box_details">
        <p class="details">
        </p>

        <div class="contact_form">
            <div class="form_subtitle">Для входа в ведите логин и пароль</div>



            <?php
            $form = ActiveForm::begin([
  'id' => 'login-form'
            ]);
            ?>
            <div class="form_row">
                <label class="contact"><strong>Логин:</strong></label>
<?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'contact_input'])->label('') ?>
            </div>
            <div class="form_row">
                <label class="contact"><strong>Пароль:</strong></label>
            <?= $form->field($model, 'password')->passwordInput(['class' => 'contact_input'])->label('')?>
            </div>
            <div class="form_row">
        <div class="terms">
          
       
            <?=
            $form->field($model, 'rememberMe')->checkbox([
            ])
                    
            ?>
 </div>
    </div> 
           <div class="form_row">
            <?= Html::submitButton('Вход', ['class' => 'register', 'name' => 'login-button','style'=>'width:100%;']) ?>
           </div>

<?php ActiveForm::end(); ?>

        </div>  

    </div>	
    <div class="clear"></div>
</div><!--end of left content-->



