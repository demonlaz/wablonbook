<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comentbook".
 *
 * @property integer $id
 * @property string $login
 * @property integer $id_book
 * @property string $text
 * @property string $datetime
 */
class Comentbook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comentbook';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_book', 'text'], 'required'],
            [['id_book'], 'integer'],
            [['text'], 'string'],
            [['datetime'], 'safe'],
            [['login'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'id_book' => 'Id Book',
            'text' => 'Text',
            'datetime' => 'Datetime',
        ];
    }
}
