<?php
/**
 * Created by PhpStorm.
 * User: Demon
 * Date: 10.04.2017
 * Time: 11:56
 */

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;
class RegistrForm extends Model
{
    public $login;
    public $mail;
    public $pass1;
    public $pass2;


    public function rules(){

        return[
            [['login','mail','pass1','pass2',],'required','message'=>'Заполните поле'],
            ['mail','email','message'=>'Ну совсем это не email'],
            [['login','mail'],'unique','targetClass'=>'app\models\User','message'=>'Пользователь существует'],
            ['login','string','min'=>5,'max'=>10,'message'=>'от 5 до 10 символов'],
            [['pass1','pass2'],'string','min'=>5,'max'=>10,'message'=>'от 5 до 10 символов'],
            [ ['pass2'], 'compare', 'compareAttribute' => 'pass1','message'=>'Пароли не совпадают']

        ];


    }
    public function attributeLabels(){

        return [
            'login'=>'Логин',
        'pass1'=>'Пароль',
        'pass2'=>'Потвердите пароль',
        'mail'=>'Email@mail.ru'
        ];
    }
        public function recordBd(){
//            "login,nic,pass,mail,ip,datatimee,lvl,opit,xpMin,xpMax,sposobnosti,naviki,money,intelekt,reakcia,koncentracia",
//                    "'$login','$random_nic','$password1','$mailt','$ip','$date','9','0','500','1000','10','5','500','1','1','1'");
//Yii::$app->request->userIP

            $newsave= new User();
            $newsave->login=$this->login;
            $newsave->password=md5($this->pass1);
            $newsave->mail=$this->mail;
            $newsave->ip=Yii::$app->request->userIP;
            $newsave->datatime=$this->date();

            $newsave->save();

    }

    private function date(){

            return date('c');
    }
}