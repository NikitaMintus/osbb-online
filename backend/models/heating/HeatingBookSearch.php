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
            [['heating_book_id', 'heating_rate_id', 'hotwater_rate_id', 'heating_invoice_id', 'hotwater_invoice_id', 'heating_perk_id', 'hotwater_perk_id'], 'integer'],
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
            'heating_rate_id' => $this->heating_rate_id,
            'hotwater_rate_id' => $this->hotwater_rate_id,
            'heating_invoice_id' => $this->heating_invoice_id,
            'hotwater_invoice_id' => $this->hotwater_invoice_id,
            'heating_perk_id' => $this->heating_perk_id,
            'hotwater_perk_id' => $this->hotwater_perk_id,
        ]);

        return $dataProvider;
    }
}
