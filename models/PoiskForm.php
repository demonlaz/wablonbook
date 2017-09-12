<?php
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 16.05.2017
 * Time: 20:34
 */

namespace app\models;
use yii\base\Model;

class PoiskForm extends Model
{
    public $zapros;

    public function rules()
    {
        return[


            [['zapros'], 'required','message'=>'Для поиска необходимо ввести что-либо! '],
        ];
    }
    public function attributeLabels()
    {
        return [
            'zapros' => '',
        ];
    }
}