<?php

/* @var $this yii\web\View */
use app\components\NewbookWidget;
$this->title = 'Главная';
?>
  
      
       	<div class="left_content">
              <div class="title"><span class="title_icon"><img src="/images/bullet2.gif" alt="" title="" /></span>Новинки!</div> 
        	<!--новинки------------------------------------->         
             <div class="new_products">
                <?php echo NewbookWidget::widget(['new'=>true]);?>
             </div>   
                <!----------------------------------------->
                
                
                
                
         <div class="clear"></div>
            <div class="title"><span class="title_icon"><img src="/images/bullet1.gif" alt="" title="" /></span>Будет интересно!</div>
         <div class="clear"></div>
         
         
         
         
         <!--рекомендуемые------------------------------------------->
         
         
         
         <?php echo NewbookWidget::widget(['recoment'=>true])?>
         
         
         
  
            <!-------------------------------------------------------------->
            
       
        </div><!--end of left content-->
       
       
       
       
      