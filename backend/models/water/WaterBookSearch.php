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
            [['water_book_id', 'int_water_private_code'], 'integer'],
            [['dec_water_rate_delivery', 'dec_water_rate_drainage', 'dec_counter_previous_coldwater', 'dec_counter_previous_hotwater', 'dec_water_perk', 'dec_water_perk_volume'], 'number'],
            [['water_rate_delivery_date_of_filling', 'water_rate_drainage_date_of_filling', 'date_of_last_payment', 'water_perk_date_of_filling'], 'safe'],
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
            'int_water_private_code' => $this->int_water_private_code,
            'dec_water_rate_delivery' => $this->dec_water_rate_delivery,
            'dec_water_rate_drainage' => $this->dec_water_rate_drainage,
            'water_rate_delivery_date_of_filling' => $this->water_rate_delivery_date_of_filling,
            'water_rate_drainage_date_of_filling' => $this->water_rate_drainage_date_of_filling,
            'dec_counter_previous_coldwater' => $this->dec_counter_previous_coldwater,
            'dec_counter_previous_hotwater' => $this->dec_counter_previous_hotwater,
            'date_of_last_payment' => $this->date_of_last_payment,
            'dec_water_perk' => $this->dec_water_perk,
            'dec_water_perk_volume' => $this->dec_water_perk_volume,
            'water_perk_date_of_filling' => $this->water_perk_date_of_filling,
        ]);

        return $dataProvider;
    }
}
