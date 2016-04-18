<?php

namespace backend\models\gas;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\gas\GasBook;

/**
 * GasBookSearch represents the model behind the search form about `backend\models\gas\GasBook`.
 */
class GasBookSearch extends GasBook
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gas_book_id', 'int_gas_personal_code'], 'integer'],
            [['dec_gas_rate', 'dec_gas_perk', 'dec_perk_gas_volume', 'dec_counter_previous'], 'number'],
            [['gas_rate_date_of_filling', 'date_of_last_payment', 'gas_perk_date_of_filling'], 'safe'],
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
        $query = GasBook::find();

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
            'gas_book_id' => $this->gas_book_id,
            'int_gas_personal_code' => $this->int_gas_personal_code,
            'dec_gas_rate' => $this->dec_gas_rate,
            'gas_rate_date_of_filling' => $this->gas_rate_date_of_filling,
            'dec_gas_perk' => $this->dec_gas_perk,
            'dec_perk_gas_volume' => $this->dec_perk_gas_volume,
            'dec_counter_previous' => $this->dec_counter_previous,
            'date_of_last_payment' => $this->date_of_last_payment,
            'gas_perk_date_of_filling' => $this->gas_perk_date_of_filling,
        ]);

        return $dataProvider;
    }
}
