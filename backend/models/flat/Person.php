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
            [['name', 'surname', 'second_name', 'birthday', 'id_code', 'passport_id', 'place_of_work'], 'required'],
            [['birthday'], 'safe'],
            [['id_code', 'passport_id'], 'integer'],
            [['name', 'surname', 'second_name'], 'string', 'max' => 100],
            [['place_of_work'], 'string', 'max' => 255],
        ];
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
}
