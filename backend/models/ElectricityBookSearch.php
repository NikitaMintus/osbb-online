<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ElectricityBook;

/**
 * ElectricityBookSearch represents the model behind the search form about `backend\models\ElectricityBook`.
 */
class ElectricityBookSearch extends ElectricityBook
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['electricity_book_id', 'int_number_of_contract', 'electricity_rate_id', 'electricity_perk_id', 'electricity_invoice_id'], 'integer'],
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
        $query = ElectricityBook::find();

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
            'electricity_book_id' => $this->electricity_book_id,
            'int_number_of_contract' => $this->int_number_of_contract,
            'electricity_rate_id' => $this->electricity_rate_id,
            'electricity_perk_id' => $this->electricity_perk_id,
            'electricity_invoice_id' => $this->electricity_invoice_id,
        ]);

        return $dataProvider;
    }
}
