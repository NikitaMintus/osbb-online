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
            [['gas_book_id', 'gas_rate_id', 'gas_perk_id', 'gas_invoice_id'], 'integer'],
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
            'gas_rate_id' => $this->gas_rate_id,
            'gas_perk_id' => $this->gas_perk_id,
            'gas_invoice_id' => $this->gas_invoice_id,
        ]);

        return $dataProvider;
    }
}
