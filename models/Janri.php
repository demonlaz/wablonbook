<?php

namespace app\models;

use Yii;
use app\models\Category;
/**
 * This is the model class for table "janri".
 *
 * @property integer $id
 * @property string $name
 */
class Janri extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'janri';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    public function getCategory(){

        return $this->hasMany(Category::className(),['id_janri'=>'id']);
    }
}
