<?php

namespace backend\models\flat;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\flat\Flat;

/**
 * FlatSearch represents the model behind the search form about `backend\models\flat\Flat`.
 */
class FlatSearch extends Flat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['flat_id', 'paybook_id', 'block', 'floor', 'user_id'], 'integer'],
            [['size_of_flat'], 'number'],
            [['adress'], 'safe'],
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
        $query = Flat::find();

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
            'flat_id' => $this->flat_id,
            'paybook_id' => $this->paybook_id,
            'block' => $this->block,
            'floor' => $this->floor,
            'size_of_flat' => $this->size_of_flat,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'adress', $this->adress]);

        return $dataProvider;
    }
}
