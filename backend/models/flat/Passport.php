<?php

namespace backend\models\flat;

use Yii;

/**
 * This is the model class for table "passport".
 *
 * @property integer $passport_id
 * @property string $series_number_of_passport
 * @property string $number_of_passport
 * @property string $issued_by
 * @property string $issued_date
 *
 * @property Person[] $people
 */
class Passport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'passport';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['series_number_of_passport', 'number_of_passport', 'issued_by', 'issued_date'], 'required'],
            [['issued_date'], 'safe'],
            [['series_number_of_passport'], 'string', 'max' => 2],
            [['number_of_passport'], 'string', 'max' => 6],
            [['issued_by'], 'string', 'max' => 150],
            [['series_number_of_passport', 'number_of_passport'], 'unique', 'targetAttribute' => ['series_number_of_passport', 'number_of_passport'], 'message' => 'The combination of Series Number Of Passport and Number Of Passport has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'passport_id' => 'Passport ID',
            'series_number_of_passport' => 'Series Number Of Passport',
            'number_of_passport' => 'Number Of Passport',
            'issued_by' => 'Issued By',
            'issued_date' => 'Issued Date',
        ];
    }

    public function getNumberSeriesOfPassport()
    {
        return  $this->series_number_of_passport . ' ' .  $this->number_of_passport;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::className(), ['passport_id' => 'passport_id']);
    }
}
