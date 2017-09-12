<?php
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 26.05.2017
 * Time: 23:45
 */

namespace app\models;


use yii\base\Model;

class ChatForm extends Model
{
    public $content;
    public $captcha;

    public function rules()
    {
        return [
            [['content'], 'required', 'message' => 'Вы не чего не в вели!'],
            ['captcha', 'captcha', 'message' => 'Каптча не верна!'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'content' => ''
            , 'captcha' => ''
        ];
    }


}
