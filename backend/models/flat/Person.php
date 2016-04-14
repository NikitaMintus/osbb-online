<?php

namespace backend\models\flat;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property integer $person_id
 * @property string $name
 * @property string $surname
 * @property string $second_name
 * @property string $birthday
 * @property integer $id_code
 * @property integer $passport_id
 * @property string $place_of_work
 *
 * @property CatalogOfDomicile[] $catalogOfDomiciles
 * @property Owner[] $owners
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $passport1;


    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'second_name', 'birthday', 'id_code', 'passport_id', 'place_of_work'], 'required', 'message' => 'Это поле не может быть пустым'],
            [['birthday'], 'safe', 'message' => 'Это поле не может быть пустым'],
            ['birthday', 'checkDate'],
            [['id_code', 'passport_id'], 'integer', 'message' => 'Это поле должно содержать только цифры'],
            [['name', 'surname', 'second_name'], 'string', 'max' => 100],
            [['place_of_work'], 'string', 'max' => 255],
        ];
    }


    public function checkDate($attribute, $params)
    {
        $today = date('Y-m-d');
        $currentDate = date($this->birthday);
        if($currentDate > $today)
        {
            $this->addError($attribute, 'Дата рождения должна быть меньше текущей даты');
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'person_id' => 'Person ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'second_name' => 'Second Name',
            'birthday' => 'Birthday',
            'id_code' => 'Id Code',
            'passport_id' => 'Passport ID',
            'place_of_work' => 'Place Of Work',
        ];
    }

    /**
     * @return string
     */
    public function getPersonFullName()
    {
        return ucfirst($this->surname) . ' ' . ucfirst($this->name) . ' ' . ucfirst($this->second_name);
    }

    public function getPersonFIO()
    {
        return ucfirst($this->surname) . ' ' . strtoupper(mb_substr($this->name, 0, 1)) . '. ' . strtoupper(mb_substr($this->second_name, 0, 1)) . '.';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogOfDomiciles()
    {
        return $this->hasMany(CatalogOfDomicile::className(), ['person_id' => 'person_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwners()
    {
        return $this->hasMany(Owner::className(), ['person_id' => 'person_id']);
    }

    public function getPassport()
    {
       return $this->passport1 = $this->hasOne(Passport::className(), ['passport_id' => 'passport_id']);

    }

    public function getPassportData()
    {
        return $this->passport1->number_of_passport;
    }
}