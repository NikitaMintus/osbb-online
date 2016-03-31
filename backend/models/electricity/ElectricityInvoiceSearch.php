<?php

namespace backend\models\electricity;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\electricity\ElectricityInvoice;

/**
 * ElectricityInvoiceSearch represents the model behind the search form about `backend\models\ElectricityInvoice`.
 */
class ElectricityInvoiceSearch extends ElectricityInvoice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['electricity_invoice_id', 'electricity_catalog_rates_invoice_id', 'electricity_perk_id'], 'integer'],
            [['dec_counter_current', 'dec_counter_previous', 'dec_substraction', 'dec_sum', 'dec_fine', 'dec_total'], 'number'],
            [['date_of_filling'], 'safe'],
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
            'dec_counter_current' => $this->dec_counter_current,
            'dec_counter_previous' => $this->dec_counter_previous,
            'dec_substraction' => $this->dec_substraction,
            'electricity_catalog_rates_invoice_id' => $this->electricity_catalog_rates_invoice_id,
            'dec_sum' => $this->dec_sum,
            'electricity_perk_id' => $this->electricity_perk_id,
            'dec_fine' => $this->dec_fine,
            'date_of_filling' => $this->date_of_filling,
            'dec_total' => $this->dec_total,
        ]);

        return $dataProvider;
    }
}
