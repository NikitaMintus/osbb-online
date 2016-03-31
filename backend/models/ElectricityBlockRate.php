<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "electricityBlockRate".
 *
 * @property integer $electricity_block_rate_id
 * @property string $dec_price
 * @property integer $int_from_kwt_hour
 * @property integer $int_to_kwt_hour
 *
 * @property ElectricityRate[] $electricityRates
 */
class ElectricityBlockRate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'electricityBlockRate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dec_price', 'int_from_kwt_hour', 'int_to_kwt_hour'], 'required'],
            [['dec_price'], 'number'],
            [['int_from_kwt_hour', 'int_to_kwt_hour'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'electricity_block_rate_id' => 'Electricity Block Rate ID',
            'dec_price' => 'Dec Price',
            'int_from_kwt_hour' => 'Int From Kwt Hour',
            'int_to_kwt_hour' => 'Int To Kwt Hour',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElectricityRates()
    {
        return $this->hasMany(ElectricityRate::className(), ['electricity_block_rate_id' => 'electricity_block_rate_id']);
    }
}
