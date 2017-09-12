<?php
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 17.07.2017
 * Time: 12:22
 */
?>
<div class="row"">
<div class="col-xs-4" style="border: groove;
border-width:7px;
border-color: #00CC00;
border-top-left-radius: 50%;
 padding: 4px;
height: 200px;

overflow: auto;
">
    <h3 class="h3Onlain" >Онлайн</h3>
<ol class="ball">

    <?php

    foreach ($user as $v){
     if(time()-$v['dataEndEnter']<=900) {
         $kogda=Yii::$app->formatter->asRelativeTime($v['dataEndEnter']);
         echo "<li class='colorOnlain'><a href=''><span class='login'>{$v['login']}</span> был {$kogda}</a></li>";

     }
    }

    ?>

</ol>

</div>
    <?=\app\components\NewsWidget::widget();?>
</div>



<style>
    .login{
        font-size: 18px;
        color: red;
    }


    .h3Onlain{
        text-align: center;
    }

   .ball{
        list-style: none;
        margin: 0;
    }
  .ball a{
        width: 100%;
      font-weight: 600;
        color:#00CCFF;
        text-decoration: none;
        display: inline-block;
        padding-left:25px;
        height: 44px;
        line-height: 44px;
        font-size: 15px;
        position: relative;
        transition: .3s linear;
    }

.ball a:before{
        content: "";
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: #66afe9;
        position: absolute;
        left:-30px;
        top:7px;
    }
  .ball li{
        position: relative;  }
  .ball li:before{
        content: "";
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #00CC00;
        position: absolute;
        top:12px;
        left:-30px;
        z-index: 2;
        transition: .4s ease-in-out;

    }
  .ball li:hover:before{
        left:-20px;
    }
</style>