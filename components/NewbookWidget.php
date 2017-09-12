<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Вывод книг в раздел новые 
 */

namespace app\components;
use Yii;
use app\models\Book;

/**
 * Description of NewBookWidget
 *
 * @author demon
 */
class NewbookWidget extends \yii\base\Widget {

//для блока новые
    public $new;
    //для блока рекомендуемые
    public $recoment;


    function init() {
        parent::init();
        if ($this->new === null) {
            $this->new = false;
        } else {
            $this->new = true;
        }

        if ($this->recoment === null) {
            $this->recoment = false;
        } else {
            $this->recoment = true;
        }
    }

    function run() {
    $new= $this->new;
   $recoment= $this->recoment;
        if ($this->new) {
            $modelBook = Book::getDb()->cache(function($Book) {

                return Book::find()->indexBy("id")->orderBy('data_add DESC')->asArray()->limit(6)->all();
            }, 1);
        }
            if ($this->recoment) {
            
                $modelBook= $this->randomaiser();
                       
        }
        return $this->render('newbook', compact("modelBook",'new','recoment'));
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    private function  randomaiser(){
        
        $count=Yii::$app->db->createCommand('SELECT COUNT(*) FROM book')->queryScalar();
        $qure=[];
        while (count($qure)<10){
            $rend= rand(0,$count);
            $qure[]='SELECT * FROM book LIMIT '.$rend.', 5';
            
        }
        $qure=implode(' UNION ',$qure);
        
        $res=Yii::$app->db->createCommand($qure)->queryAll();
        
        return $res;
        
    }
    
    
}
