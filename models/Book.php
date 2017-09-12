<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\Category;
/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $namebook
 * @property string $avtor
 * @property string $content
 * @property string $imagesbook
 * @property string $urlbookpdf
 * @property string $dataexit
 * @property string $data_add
 * @property string $urlbookfb2
 * @property integer $dowload
 */
class Book extends \yii\db\ActiveRecord
{
    public $uploadImage;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id','namebook'], 'required','message'=>'Не может быть пустым'],
            [['parent_id', 'dowload'], 'integer'],
            [['avtor', 'content'], 'string'],
            [['dataexit', 'data_add'], 'safe'],
            [['namebook', 'imagesbook','urlbookrar', 'urlbookpdf', 'urlbookfb2'], 'string', 'max' => 255],
            [['urlbookpdf', 'urlbookfb2'],'url'],
            ['uploadImage','image','extensions'=>'png,jpg,gif','message'=>'Форматы для загрузки png,jpg,gif',
                'maxWidth'=>2500,'maxHeight'=>2500,],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Категории',
            'namebook' => 'Названия книги',
            'avtor' => 'Автор',
            'content' => 'Содержание',
            'imagesbook' => 'Абложка',
            'urlbookpdf' => 'Адрес скачивания PDF',
            'dataexit' => 'Дата выпуска',
            'data_add' => 'Дата дабавления на сайт',
            'urlbookfb2' => 'Адрес скачивания FB2',
            'urlbookrar'=>'Сылка на скачивания RAR',
            'dowload' => 'Количество скачиваний',
        ];
    }



    //для виджета админки






    public function getCategory(){

        return $this->hasOne(Category::className(),['id'=>'parent_id']);
    }

    public function getParentName()
    {
        $parent = $this->category;

        return $parent ? $parent->name : 'нет';
    }

    public static function getParentsList()
    {
        // Выбираем только те категории, у которых есть дочерние категории
        $parents = Category::find()
            ->select(['category.id', 'category.name'])
            ->join('JOIN', 'book', 'book.parent_id=category.id')
            ->distinct(true)
            ->all();

        return ArrayHelper::map($parents, 'id', 'name');
    }








}