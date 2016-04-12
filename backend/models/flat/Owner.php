<?php

namespace backend\models\flat;

use Yii;

/**
 * This is the model class for table "owner".
 *
 * @property integer $owner_id
 * @property integer $person_id
 *
 * @property Flat[] $flats
 * @property Person $person
 */
class Owner extends \yii\db\ActiveRecord
{
    public $personPassport1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'owner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['person_id'], 'required'],
            [['person_id'], 'integer'],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'person_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'owner_id' => 'Owner ID',
            'person_id' => 'Person ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlats()
    {
        return $this->hasMany(Flat::className(), ['owner_id' => 'owner_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['person_id' => 'person_id']);
    }

    public function getPersonName()
    {
        $probaView = $this->person->name;
        return $this->person->name;
    }

    public function getPersonSurname()
    {
        return $this->person->surname;
    }

    public function getPersonSecondName()
    {
        return $this->person->second_name;
    }

    public function  getPersonFIO()
    {
        $name = $this->person->name;
        $surname = $this->person->surname;
        $secondName = $this->person->second_name;

        return $surname . ' ' . mb_substr($name, 0, 1) . '.' . mb_substr($secondName, 0 ,1) . '.';
    }

    public function getPersonIdCode()
    {
        return $this->person->id_code;
    }

    public function getPersonBirthday()
    {
        return $this->person->birthday;
    }

    public function getPersonPlaceOfWork()
    {
        return $this->person->place_of_work;
    }

    public function getPersonPassport()
    {
        return $this->person->passport;
    }

    public function getPersonPassportData()
    {
        return $this->getPersonPassport()->series_number_of_passport . ' ' .$this->getPersonPassport()->number_of_passport;
    }

    public function getPersonPassportIssuedBy()
    {
        return $this->getPersonPassport()->issued_by;
    }

    public function getPersonPassportIssuedDate()
    {
        return $this->getPersonPassport()->issued_date;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function  getPersons()
    {
        return $this->hasMany(Person::className(),['person_id' => 'person_id']);
    }


}
