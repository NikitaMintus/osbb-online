<?php

namespace backend\models\water;

use Yii;

/**
 * This is the model class for table "waterRate".
 *
 * @property integer $water_rate_id
 * @property integer $int_water_delivery_standart
 * @property integer $int_water_drainage_standart
 * @property string $dec_rate_water_delivery
 * @property string $dec_rate_water_drainage
 * @property string $date_of_filling
 * @property string $date_of_decree
 *
 * @property WaterBook[] $waterBooks
 */
class WaterRate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'waterRate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['int_water_delivery_standart', 'int_water_drainage_standart', 'dec_rate_water_delivery', 'dec_rate_water_drainage', 'date_of_filling'], 'required'],
            [['int_water_delivery_standart', 'int_water_drainage_standart'], 'integer'],
            [['dec_rate_water_delivery', 'dec_rate_water_drainage'], 'number'],
            [['date_of_filling', 'date_of_decree'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'water_rate_id' => 'Water Rate ID',
            'int_water_delivery_standart' => 'Int Water Delivery Standart',
            'int_water_drainage_standart' => 'Int Water Drainage Standart',
            'dec_rate_water_delivery' => 'Dec Rate Water Delivery',
            'dec_rate_water_drainage' => 'Dec Rate Water Drainage',
            'date_of_filling' => 'Date Of Filling',
            'date_of_decree' => 'Date Of Decree',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaterBooks()
    {
        return $this->hasMany(WaterBook::className(), ['water_rate_id' => 'water_rate_id']);
    }
}
