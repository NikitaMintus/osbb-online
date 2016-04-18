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
            [['utilities_book_id', 'int_utilities_personal_code'], 'integer'],
            [['dec_utlities_rate', 'dec_utilities_perk', 'dec_utilities_size_of_flat'], 'number'],
            [['utilities_rate_date_of_filling', 'utilities_perk_date_of_filling', 'utilities_date_of_last_payment'], 'safe'],
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
            'int_utilities_personal_code' => $this->int_utilities_personal_code,
            'dec_utlities_rate' => $this->dec_utlities_rate,
            'utilities_rate_date_of_filling' => $this->utilities_rate_date_of_filling,
            'dec_utilities_perk' => $this->dec_utilities_perk,
            'utilities_perk_date_of_filling' => $this->utilities_perk_date_of_filling,
            'dec_utilities_size_of_flat' => $this->dec_utilities_size_of_flat,
            'utilities_date_of_last_payment' => $this->utilities_date_of_last_payment,
        ]);

        return $dataProvider;
    }
}
