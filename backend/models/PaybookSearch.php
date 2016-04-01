<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Paybook;

/**
 * PaybookSearch represents the model behind the search form about `backend\models\Paybook`.
 */
class PaybookSearch extends Paybook
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['paybook_id', 'utilities_book_id', 'gas_book_id', 'water_book_id', 'heating_book_id', 'electric_book_id'], 'integer'],
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
        $query = Paybook::find();

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
            'paybook_id' => $this->paybook_id,
            'utilities_book_id' => $this->utilities_book_id,
            'gas_book_id' => $this->gas_book_id,
            'water_book_id' => $this->water_book_id,
            'heating_book_id' => $this->heating_book_id,
            'electric_book_id' => $this->electric_book_id,
        ]);

        return $dataProvider;
    }
}
