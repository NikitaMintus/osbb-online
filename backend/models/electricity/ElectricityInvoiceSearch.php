<?php

namespace backend\models\electricity;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\electricity\ElectricityInvoice;

/**
 * ElectricityInvoiceSearch represents the model behind the search form about `backend\models\electricity\ElectricityInvoice`.
 */
class ElectricityInvoiceSearch extends ElectricityInvoice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['electricity_invoice_id', 'electric_book_id'], 'integer'],
            [['adress', 'date_of_filling'], 'safe'],
            [['dec_counter_current', 'dec_counter_previous', 'dec_substraction', 'dec_amount_block1', 'dec_payment_block1', 'dec_amount_block2', 'dec_payment_block2', 'dec_amount_block3', 'dec_payment_block3', 'dec_sum', 'dec_electricity_perk', 'dec_total'], 'number'],
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
        $query = ElectricityInvoice::find();

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
            'electricity_invoice_id' => $this->electricity_invoice_id,
            'electric_book_id' => $this->electric_book_id,
            'dec_counter_current' => $this->dec_counter_current,
            'dec_counter_previous' => $this->dec_counter_previous,
            'dec_substraction' => $this->dec_substraction,
            'dec_amount_block1' => $this->dec_amount_block1,
            'dec_payment_block1' => $this->dec_payment_block1,
            'dec_amount_block2' => $this->dec_amount_block2,
            'dec_payment_block2' => $this->dec_payment_block2,
            'dec_amount_block3' => $this->dec_amount_block3,
            'dec_payment_block3' => $this->dec_payment_block3,
            'dec_sum' => $this->dec_sum,
            'dec_electricity_perk' => $this->dec_electricity_perk,
            'date_of_filling' => $this->date_of_filling,
            'dec_total' => $this->dec_total,
        ]);

        $query->andFilterWhere(['like', 'adress', $this->adress]);

        return $dataProvider;
    }
}
