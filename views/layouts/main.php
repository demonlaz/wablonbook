<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\components\NewsWidget;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
   
<?php $this->beginBody() ?>
   <div id="wrap">
<!--menu-->
       <div class="header">
           <div class="logo"><a href="<?= Url::to(['site/index'])?>"><img src="/images/logo.gif" alt="" title="" border="0" /></a></div>            
       <!--menu-->
                <div id="menu">
            <ul>                                                                       
            <li class="selected"><a href="<?= Url::to(['site/index']);?>">Главная</a></li>    
            <li><a href="<?= Url::to(['site/about']);?>">О нас</a></li>
            <li><a href="<?= Url::to(['site/books']);?>">Книги</a></li>
            <li><a href="<?= Url::to(['site/special']);?>">Спецальные книги</a></li>
            <li><a href="<?= Url::to(['site/akaunt']);?>">Мой Акаунт</a></li>
            <li><a href="<?= Url::to(['site/register']);?>">Регистрация</a></li>
            <li><a href="<?= Url::to(['site/kontakt']);?>">Контакты</a></li>
         
                
                
<!--            <li><a href="about.html">about</a></li>
            <li><a href="category.html">books</a></li>
            <li><a href="specials.html">specials books</a></li>
            <li><a href="myaccount.html">my accout</a></li>
            <li><a href="register.html">register</a></li>
            <li><a href="details.html">prices</a></li>
            <li><a href="contact.html">contact</a></li>-->
            </ul>
        </div>     
            
            
       </div> 
<!--endmenu-->

 <div class="center_content">
     
     
     
        <?= $content ?>
     
     
     
     
        <div class="right_content">
        	<div class="languages_box">
            <span class="red">Язык:</span>
            <a href="#" class="selected"><img src="/images/gb.gif" alt="" title="" border="0" /></a>
            <!--<a href="#"><img src="/images/fr.gif" alt="" title="" border="0" /></a>-->
            <!--<a href="#"><img src="/images/de.gif" alt="" title="" border="0" /></a>-->
            </div>
                <div class="currency">
                <span class="red">Пожертвовать: </span>
                <!--<a href="#">ЯД</a>-->
                <!--<a href="#">EUR</a>-->
                <a href="#" class="selected">ЯД(яндекс)</a>
                </div>
                
                
              <div class="cart">
<!--                  <div class="title"><span class="title_icon"><img src="/images/cart.gif" alt="" title="" /></span>My cart</div>
                  <div class="home_cart_content">
                  3 x items | <span class="red">TOTAL: 100$</span>
                  </div>
                  <a href="cart.html" class="view_cart">view cart</a>-->
              
              </div>
                       
            	
        
        
             <div class="title"><span class="title_icon"><img src="/images/bullet3.gif" alt="" title="" /></span>Новости </div> 
             <div class="about">
             <p>
             <img src="/images/about.gif" alt="" title="" class="right" />
             <?= NewsWidget::widget()?>
             </p>
             
             </div>
             
             
             <div class="right_box">
             
             	<div class="title"><span class="title_icon"><img src="/images/bullet5.gif" alt="" title="" /></span>Categories</div> 
                
                <ul class="list">
                <li><a href="#">accesories</a></li>
                <li><a href="#">books gifts</a></li>
                <li><a href="#">specials</a></li>
                <li><a href="#">hollidays gifts</a></li>
                <li><a href="#">accesories</a></li>
                <li><a href="#">books gifts</a></li>
                <li><a href="#">specials</a></li>
                <li><a href="#">hollidays gifts</a></li>
                <li><a href="#">accesories</a></li>
                <li><a href="#">books gifts</a></li>
                <li><a href="#">specials</a></li>                                              
                </ul>
                
             	 
             
             </div>         
             
        
        </div><!--end of right content-->
        
     
     <div class="clear"></div>
         
     
     
     
     
     
     
 </div>

<!--footer-->
<div class="footer">
       	<div class="left_footer"><img src="/images/footer_logo.gif" alt="" title="" /><br /> <a href="http://csscreme.com/freecsstemplates/" title="free templates"><img src="/images/csscreme.gif" alt="free templates" title="free templates" border="0" /></a></div>
        <div class="right_footer">
        <a href="#">Главная</a>
        <a href="#">О нас</a>
        <a href="#">services</a>
        <a href="#">privacy policy</a>
        <a href="#">contact us</a>
       
        </div>
        
       
       </div>
  </div>
<?php $this->endBody() ?>
  
</body>
</html>
<?php $this->endPage() ?>
