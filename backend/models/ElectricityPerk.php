<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "electricityPerk".
 *
 * @property integer $electricity_perk_id
 * @property string $dec_perk
 * @property integer $int_percent
 * @property integer $int_amount_of_kwt_hour
 *
 * @property ElectricityBook[] $electricityBooks
 */
class ElectricityPerk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'electricityPerk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dec_perk', 'int_percent', 'int_amount_of_kwt_hour'], 'required'],
            [['dec_perk'], 'number'],
            [['int_percent', 'int_amount_of_kwt_hour'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'electricity_perk_id' => 'Electricity Perk ID',
            'dec_perk' => 'Dec Perk',
            'int_percent' => 'Int Percent',
            'int_amount_of_kwt_hour' => 'Int Amount Of Kwt Hour',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElectricityBooks()
    {
        return $this->hasMany(ElectricityBook::className(), ['electricity_perk_id' => 'electricity_perk_id']);
    }
}
