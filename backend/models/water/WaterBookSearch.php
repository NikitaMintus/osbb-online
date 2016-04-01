<?php

namespace backend\models\water;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\water\WaterBook;

/**
 * WaterBookSearch represents the model behind the search form about `backend\models\water\WaterBook`.
 */
class WaterBookSearch extends WaterBook
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['water_book_id', 'water_rate_id', 'int_count_of_people', 'water_perk_id', 'water_invoice_id'], 'integer'],
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
        $query = WaterBook::find();

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
            'water_book_id' => $this->water_book_id,
            'water_rate_id' => $this->water_rate_id,
            'int_count_of_people' => $this->int_count_of_people,
            'water_perk_id' => $this->water_perk_id,
            'water_invoice_id' => $this->water_invoice_id,
        ]);

        return $dataProvider;
    }
}
