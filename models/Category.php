<?php

namespace app\models;
use yii\helpers\ArrayHelper;
use Yii;
use app\models\Janri;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $id_janri
 */
class category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','id_janri'], 'required'],
            [['name'], 'string'],
            [['id_janri'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'id_janri' => 'Привязка к жанру',
        ];
    }

    public function getBook(){

        return $this->hasMany(Book::className(),['parent_id'=>'id']);
    }











    public function getJanri(){

        return $this->hasOne(Janri::className(),['id'=>'id_janri']);
    }

    public function getParentName()
    {
        $parent = $this->janri;

        return $parent ? $parent->name : 'нет';
    }

    public static function getParentsList()
    {
        // Выбираем только те категории, у которых есть дочерние категории
        $parents = Janri::find()
            ->select(['janri.id', 'janri.name'])
            ->join('JOIN', 'category', 'janri.id=category.id_janri')
            ->distinct(true)
            ->all();

        return ArrayHelper::map($parents, 'id', 'name');
    }




}
