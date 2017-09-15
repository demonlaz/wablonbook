<?php

/**
 * Created by PhpStorm.
 * User: demon
 * Date: 26.05.2017
 * Time: 14:05
 */
use yii\helpers\Url;
use yii\helpers\Html;
use app\components\BookWidget;
?>

<?php foreach ($modelBook as $v) {
    $this->title = Html::encode($v['namebook']); ?>


    <div class="left_content">
        <div class="crumb_nav">
            <a href=<?= Url::to(['site/index']) ?>>Главная</a> &gt;&gt; <a href=<?= Url::to(['site/category', 'id' => BookWidget::category($v['parent_id'])->id]) ?>> <?= BookWidget::category($v['parent_id'])->name ?>
            </a> &gt;&gt;<?= Html::encode($v['namebook']) ?>
        </div>
        <div class="title"><span class="title_icon"><img src="/images/bullet1.gif" alt="" title="" /></span><?= Html::encode($v['namebook']) ?></div>

        <div class="feat_prod_box_details">

            <div class="prod_img"><a href="#"><img src="/imageBook/<?= Html::encode($v['imagesbook']) ?>" alt="" title="" border="0" 
                                                   width="100" height="150"                 /></a>
                <br /><br />

            </div>

            <div class="prod_det_box">
                <div class="box_top"></div>
                <div class="box_center">
                    <div class="prod_title">Содержание</div>
                    <p class="details"><?= Html::encode($v['content']) ?> </p>
    <?php if (!empty($v['urlbookfb2'])) { ?>
                        <a href="<?= $v['urlbookfb2'] ?>" target="_blank" class="more"><img src="/images/order_now.gif" alt="" title="" border="0" /></a>

                    <?php } if (!empty($v['urlbookpdf'])) { ?>
                        <a href="<?= $v['urlbookpdf'] ?>" target="_blank" class="more"><img src="/images/imafb2.gif" alt="" title="" border="0" /></a>
    <?php } ?>
                    <div class="clear"></div>
                </div>

                <div class="box_bottom"></div>
            </div>    
            <div class="clear"></div>
        </div>	





        <div class="clear"></div>
    </div><!--end of left content-->




<?php }
?>