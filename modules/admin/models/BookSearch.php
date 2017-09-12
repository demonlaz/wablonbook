<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Book;

/**
 * BookSearch represents the model behind the search form about `app\models\Book`.
 */
class BookSearch extends Book
{

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
            [['id', 'parent_id', 'dowload'], 'integer'],
            [['namebook', 'avtor', 'content', 'imagesbook', 'urlbookpdf', 'dataexit', 'data_add', 'urlbookfb2'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Book::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'dataexit' => $this->dataexit,
            'data_add' => $this->data_add,
            'dowload' => $this->dowload,
        ]);

        $query->andFilterWhere(['like', 'namebook', $this->namebook])
            ->andFilterWhere(['like', 'avtor', $this->avtor])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'imagesbook', $this->imagesbook])
            ->andFilterWhere(['like', 'urlbookpdf', $this->urlbookpdf])
            ->andFilterWhere(['like', 'urlbookfb2', $this->urlbookfb2]);

        return $dataProvider;
    }
}
