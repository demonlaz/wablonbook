<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;
use yii\helpers\Url;

if($new){
foreach ($modelBook as $v){
?>

 <!--<div class="new_products">-->
           
                  <div class="new_prod_box" >
                      <a href="podrobnee.php" ><?= Html::encode($v['namebook'])?></a>
                        <div class="new_prod_bg">
                        <span class="new_icon"><img src="/images/new_icon.gif" alt="" title="" /></span>
                        <a href="details.html"><img src="<?=Html::encode(Url::toRoute(['/imageBook/'.$v['imagesbook']])) ?>"
                                                    alt="" title="" class="thumb" border="0" 
                                                    width="60" height="100"
                                                    /></a>
                        </div>           
                    </div>
                    
                       
            
            <!--</div>--> 
<?php }}?>
<?php
if($recoment){
    foreach ($modelBook as $v){ ?>
        
            
            <div class="feat_prod_box">
              
                <div class="prod_img"><a href="details.html"><img width="100" height="150"
                            src="<?=Html::encode(Url::toRoute(['/imageBook/'.$v['imagesbook']])) ?>"
                                                                  alt="" title="" border="0" /></a></div>
                
                <div class="prod_det_box">
                	<div class="box_top"></div>
                    <div class="box_center">
                    <div class="prod_title"><?=Html::encode($v['namebook'])?></div>
                    <p class="details"><?=Html::encode($v['content'])?></p>
                    <a href="details.html" class="more">- more details -</a>
                    <div class="clear"></div>
                    </div>
                    
                    <div class="box_bottom"></div>
                </div>    
            <div class="clear"></div>
            </div>
        
 <?php   
}
}

?>