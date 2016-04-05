<?php

namespace backend\models\flat;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\flat\Person;

/**
 * PersonSearch represents the model behind the search form about `backend\models\flat\Person`.
 */
class PersonSearch extends Person
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['person_id', 'id_code', 'passport_id'], 'integer'],
            [['name', 'surname', 'second_name', 'birthday', 'place_of_work'], 'safe'],
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
        $query = Person::find();

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
            'person_id' => $this->person_id,
            'birthday' => $this->birthday,
            'id_code' => $this->id_code,
            'passport_id' => $this->passport_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'second_name', $this->second_name])
            ->andFilterWhere(['like', 'place_of_work', $this->place_of_work]);

        return $dataProvider;
    }
}
