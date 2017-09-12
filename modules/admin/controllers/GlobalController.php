<?php
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 03.06.2017
 * Time: 9:57
 */

namespace app\modules\admin\controllers;


use yii\web\Controller;
//для оброщения admin/global/index
class GlobalController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}