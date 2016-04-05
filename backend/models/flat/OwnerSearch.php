<?php

namespace backend\models\flat;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * OwnerSearch represents the model behind the search form about `backend\models\flat\Owner`.
 */
class OwnerSearch extends Owner
{
    /**
     * @inheritdoc
     */

    public $personName;
    public $personSurname;

    public function rules()
    {
        return [
            [['owner_id'], 'integer'],
            [['personName', 'personSurname'], 'safe'],
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


    protected function addCondition($query, $attribute, $partialMatch = false)
    {
        if (($pos = strrpos($attribute, '.')) !== false) {
            $modelAttribute = substr($attribute, $pos + 1);
        } else {
            $modelAttribute = $attribute;
        }

        $value = $this->$modelAttribute;
        if (trim($value) === '') {
            return;
        }

        /*
         * Для корректной работы фильтра со связью со
         * свой же моделью делаем:
         */
//        $attribute = "tbl_person.$attribute";
//
//        if ($partialMatch) {
//            $query->Where(['like', $attribute, $value]);
//        } else {
//            $query->andWhere([$attribute => $value]);
//        }
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
        $query = Owner::find();

        // add conditions that should always apply here
//        $query->joinWith('person', true, 'inner join');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'personName' => [
                    'asc' => ['person.name' => SORT_ASC],
                    'desc' => ['person.name' => SORT_DESC],
                    'label' => 'Person Name',
                    'default' => SORT_ASC
                ],
                'personSurname' => [
                    'asc' => ['person.surname' => SORT_ASC],
                    'desc' => ['person.surname' => SORT_DESC],
                    'label' => 'Person  Surname'
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith('person', true, 'inner join');
            return $dataProvider;
        }

//        $this->addCondition($query, 'personName');
//        $this->addCondition($query, 'personSurname');
//        $this->addCondition($query, 'person_id');

//        // grid filtering conditions
//        $query->andFilterWhere([
//            'owner_id' => $this->owner_id,
//        ]);
//
//
//        // Фильтр по стране
//        $query->joinWith(['person' => function ($q) {
//            $q->where('person.name LIKE "%' . $this->personName . '%"');
//        }]);
//
//        $query->joinWith(['person' => function ($q) {
//            $q->where('person.surname LIKE "%' . $this->personSurname . '%"');
//        }]);

        $query->joinWith('person')->andFilterWhere([
            'and',
            ['like', 'person.name', $this->personName],
            ['like', 'person.surname', $this->personSurname],
        ]);

        return $dataProvider;
    }
}
