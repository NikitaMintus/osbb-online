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
    public $personSecondName;
    public $personBirthday;
    public $personIdCode;
    public $personPlaceOfWork;

    public function rules()
    {
        return [
            [['owner_id'], 'integer'],
            [['personName', 'personSurname', 'personSecondName', 'personBirthday', 'personIdCode', 'personPlaceOfWork'], 'safe'],
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
        $query = Owner::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'personName' => [
                    'asc' => ['person.name' => SORT_ASC],
                    'desc' => ['person.name' => SORT_DESC],
                    'label' => 'Person Name',
                    'default' => SORT_DESC
                ],
                'personSurname' => [
                    'asc' => ['person.surname' => SORT_ASC],
                    'desc' => ['person.surname' => SORT_DESC],
                    'label' => 'Person  Surname'
                ],
                'personSecondName' => [
                    'asc' => ['person.second_name' => SORT_ASC],
                    'desc' => ['person.second_name' => SORT_DESC],
                    'label' => 'Person  SecondName'
                ],
                'personBirthday' => [
                    'asc' => ['person.birthday' => SORT_ASC],
                    'desc' => ['person.birthday' => SORT_DESC],
                    'label' => 'Person birthday'
                ],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith('person', true, 'inner join');
            return $dataProvider;
        }

        $query->joinWith('person')->andFilterWhere([
            'and',
            ['like', 'person.name', $this->personName],
            ['like', 'person.surname', $this->personSurname],
            ['like', 'person.second_name', $this->personSecondName],
            ['like', 'person.birthday', $this->personBirthday],
            ['like', 'person.id_code', $this->personIdCode],
            ['like', 'person.place_of_work', $this->personPlaceOfWork],
        ]);

        return $dataProvider;
    }
}
