<?php

namespace backend\models\electricity;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\electricity\ElectricityBook;

/**
 * ElectricityBookSearch represents the model behind the search form about `backend\models\electricity\ElectricityBook`.
 */
class ElectricityBookSearch extends ElectricityBook
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['electricity_book_id', 'int_number_of_personal_code', 'int_rate_block1_limit', 'int_rate_block2_limit', 'int_rate_block3_limit', 'dec_electric_perk_limit'], 'integer'],
            [['dec_rate_block1', 'dec_rate_block2', 'dec_rate_block3', 'dec_electric_perk'], 'number'],
            [['electric_rate_date_of_filling', 'electric_perk_date_of_filling', 'electric_date_of_last_payment'], 'safe'],
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
            'int_number_of_personal_code' => $this->int_number_of_personal_code,
            'dec_rate_block1' => $this->dec_rate_block1,
            'int_rate_block1_limit' => $this->int_rate_block1_limit,
            'dec_rate_block2' => $this->dec_rate_block2,
            'int_rate_block2_limit' => $this->int_rate_block2_limit,
            'dec_rate_block3' => $this->dec_rate_block3,
            'int_rate_block3_limit' => $this->int_rate_block3_limit,
            'dec_electric_perk' => $this->dec_electric_perk,
            'dec_electric_perk_limit' => $this->dec_electric_perk_limit,
            'electric_rate_date_of_filling' => $this->electric_rate_date_of_filling,
            'electric_perk_date_of_filling' => $this->electric_perk_date_of_filling,
            'electric_date_of_last_payment' => $this->electric_date_of_last_payment,
        ]);

        return $dataProvider;
    }
}
