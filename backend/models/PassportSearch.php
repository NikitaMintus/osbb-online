<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\flat\Passport;

/**
 * PassportSearch represents the model behind the search form about `backend\models\flat\Passport`.
 */
class PassportSearch extends Passport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['passport_id'], 'integer'],
            [['series_number_of_passport', 'number_of_passport', 'issued_by', 'issued_date'], 'safe'],
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
        $query = Passport::find();

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
            'passport_id' => $this->passport_id,
            'issued_date' => $this->issued_date,
        ]);

        $query->andFilterWhere(['like', 'series_number_of_passport', $this->series_number_of_passport])
            ->andFilterWhere(['like', 'number_of_passport', $this->number_of_passport])
            ->andFilterWhere(['like', 'issued_by', $this->issued_by]);

        return $dataProvider;
    }
}
