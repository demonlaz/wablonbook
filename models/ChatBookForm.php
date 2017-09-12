<?php
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 26.05.2017
 * Time: 23:45
 */

namespace app\models;


use yii\base\Model;

class ChatBookForm extends Model
{
    public $content;
    public $captcha;
    public $idbook;
    public function rules()
    {
        return [
            [['content','idbook'], 'required', 'message' => 'Вы не чего не в вели!'],
           ['captcha', 'captcha', 'message' => 'Каптча не верна!'],
            ['idbook','integer']

        ];
    }

    public function attributeLabels()
    {
        return [
            'content' => '',
             'captcha' => '',
            'idbook'=>''
        ];
    }


}
