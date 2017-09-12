<?php
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 26.05.2017
 * Time: 14:05
 */
use yii\helpers\Url;
use yii\helpers\Html;
?>

<?php foreach($modelBook as $v){?>

    <div class="col-xs-4">
      <?php  if($now){

          echo '<h3><span class="label label-danger">НОВИНКИ!</span></h3>';
      }


      ?>

        <div class="row" >
            <div class="col-sm-6 col-md-6 ">
                <div class="thumbnail" id="gradient">
                    <img src="<?=Html::encode(Url::toRoute(['/web/imageBook/'.$v['imagesbook']])) ?>"
                         alt="..." style="height: 200px; width: 100%" data-toggle="tooltip" title="<?=Html::encode($v['content'])?>">
                    <div class="caption">
                        <h5><strong><?=Html::encode($v['namebook'])?></h5></strong>
                        <p><?=Html::encode($v['avtor'])?></p>

                        <a href="<?=Url::to(['book/index','id'=>$v['id']])?>">  <h4><span class="label label-primary">Подробнее</span></h4> </a>
                        <h5><span class="label label-primary">Скачали <span class="badge"><?=Html::encode($v['dowload'])?></span></span></h5>


                        <p><a href="<?=Html::encode(Url::to(["site/dowload?id=$v[id]&pdf"]))?>"
                              class="btn btn-primary btn-sm" role="button"
                                <?=($v['urlbookpdf'])?'':'disabled'?>>Скачать в PDF</a>


                            <a href="<?=Html::encode(Url::to(["site/dowload?id=$v[id]&fb2"])) ?>"
                               class="btn btn-default btn-sm" role="button"
                                <?=($v['urlbookfb2'])?'':'disabled'?>>Скачать в FB2</a>

                        <a href="<?=Html::encode(Url::to(["site/dowload?id=$v[id]&rar"])) ?>"
                           class="btn btn-warning btn-sm" role="button"
                            <?=($v['urlbookrar'])?'':'disabled'?>>Скачать в RAR</a></p>

                    </div>
                </div>
            </div>
        </div>

    </div>
<?php }?>