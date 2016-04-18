<?php

namespace backend\models\heating;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\heating\HeatingBook;

/**
 * HeatingBookSearch represents the model behind the search form about `backend\models\heating\HeatingBook`.
 */
class HeatingBookSearch extends HeatingBook
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['heating_book_id', 'int_heating_private_code'], 'integer'],
            [['dec_hotwater_rate', 'dec_heating_rate', 'dec_hotwater_counter_previous', 'dec_heating_counter_previous', 'dec_hotwater_perk', 'dec_heating_perk', 'dec_hotwater_perk_volume', 'dec_heating_perk_volume'], 'number'],
            [['hotwater_perk_date_of_filling', 'heating_perk_date_of_filling', 'hotwater_rate_date_of_filling', 'heating_rate_date_of_filling', 'date_of_last_payment'], 'safe'],
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
        $query = HeatingBook::find();

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
            'heating_book_id' => $this->heating_book_id,
            'int_heating_private_code' => $this->int_heating_private_code,
            'dec_hotwater_rate' => $this->dec_hotwater_rate,
            'dec_heating_rate' => $this->dec_heating_rate,
            'dec_hotwater_counter_previous' => $this->dec_hotwater_counter_previous,
            'dec_heating_counter_previous' => $this->dec_heating_counter_previous,
            'dec_hotwater_perk' => $this->dec_hotwater_perk,
            'dec_heating_perk' => $this->dec_heating_perk,
            'dec_hotwater_perk_volume' => $this->dec_hotwater_perk_volume,
            'dec_heating_perk_volume' => $this->dec_heating_perk_volume,
            'hotwater_perk_date_of_filling' => $this->hotwater_perk_date_of_filling,
            'heating_perk_date_of_filling' => $this->heating_perk_date_of_filling,
            'hotwater_rate_date_of_filling' => $this->hotwater_rate_date_of_filling,
            'heating_rate_date_of_filling' => $this->heating_rate_date_of_filling,
            'date_of_last_payment' => $this->date_of_last_payment,
        ]);

        return $dataProvider;
    }
}
