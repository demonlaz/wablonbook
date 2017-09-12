<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $avtor
 * @property string $content
 * @property string $dateadd
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'string'],
            [['dateadd'], 'safe'],
            [['avtor'],'default', 'value' => $this->addAvtor()],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Тема',
            'avtor' => 'Автор',
            'content' => 'Содержание',
            'dateadd' => 'Дата добавления',
        ];
    }
    protected function addAvtor(){

        return Yii::$app->user->identity->login;
    }
}
