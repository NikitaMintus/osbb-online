<?php

namespace backend\models\utilities;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\utilities\UtilitiesBook;

/**
 * UtilitiesBookSearch represents the model behind the search form about `backend\models\utilities\UtilitiesBook`.
 */
class UtilitiesBookSearch extends UtilitiesBook
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['utilities_book_id', 'utlities_rate_id', 'utilities_invoice_id', 'utilities_perk_id'], 'integer'],
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
        $query = UtilitiesBook::find();

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
            'utilities_book_id' => $this->utilities_book_id,
            'utlities_rate_id' => $this->utlities_rate_id,
            'utilities_invoice_id' => $this->utilities_invoice_id,
            'utilities_perk_id' => $this->utilities_perk_id,
        ]);

        return $dataProvider;
    }
}
