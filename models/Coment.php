<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coment".
 *
 * @property integer $id
 * @property string $login
 * @property string $timdate
 * @property string $text
 */
class Coment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['timdate'], 'safe'],
            [['text'], 'required'],
            [['text'], 'string'],
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
            'timdate' => 'Timdate',
            'text' => 'Text',
        ];
    }
}
