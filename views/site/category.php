<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->title=$category->name;
?>
 	<div class="left_content">
<?php
            foreach ($modelBook as $v){ ?>
    
     <div class="feat_prod_box">
              
                <div class="prod_img"><a href="<?=Url::toRoute(['site/book','id'=>$v['id']])?>"><img width="100" height="150"
                            src="<?=Html::encode(Url::toRoute(['/imageBook/'.$v['imagesbook']])) ?>"
                                                                  alt="" title="" border="0" /></a></div>
                
                <div class="prod_det_box">
                	<div class="box_top"></div>
                    <div class="box_center">
                    <div class="prod_title"><?=Html::encode($v['namebook'])?></div>
                    <p class="details"><?=Html::encode($v['content'])?></p>
                    <a href="<?=Url::toRoute(['site/book','id'=>$v['id']])?>" 
                       class="more">- подробнее -</a>
                    <div class="clear"></div>
                    </div>
                    
                    <div class="box_bottom"></div>
                </div>    
            <div class="clear"></div>
            </div>
           
<?php 

}?>
           <?=LinkPager::widget(['pagination'=>$pagin]);?>      
        </div>

