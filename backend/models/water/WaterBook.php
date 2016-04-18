<?php

namespace backend\models\water;

use Yii;

/**
 * This is the model class for table "waterBook".
 *
 * @property integer $water_book_id
 * @property integer $int_water_private_code
 * @property string $dec_water_rate_delivery
 * @property string $dec_water_rate_drainage
 * @property string $water_rate_delivery_date_of_filling
 * @property string $water_rate_drainage_date_of_filling
 * @property string $dec_counter_previous_coldwater
 * @property string $dec_counter_previous_hotwater
 * @property string $date_of_last_payment
 * @property string $dec_water_perk
 * @property string $dec_water_perk_volume
 * @property string $water_perk_date_of_filling
 *
 * @property Paybook $paybook
 * @property WaterInvoice[] $waterInvoices
 */
class WaterBook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'waterBook';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['int_water_private_code', 'dec_water_rate_delivery', 'dec_water_rate_drainage', 'water_rate_delivery_date_of_filling', 'water_rate_drainage_date_of_filling', 'dec_counter_previous_coldwater', 'dec_counter_previous_hotwater', 'date_of_last_payment', 'dec_water_perk', 'dec_water_perk_volume', 'water_perk_date_of_filling'], 'required'],
            [['int_water_private_code'], 'integer'],
            [['dec_water_rate_delivery', 'dec_water_rate_drainage', 'dec_counter_previous_coldwater', 'dec_counter_previous_hotwater', 'dec_water_perk', 'dec_water_perk_volume'], 'number'],
            [['water_rate_delivery_date_of_filling', 'water_rate_drainage_date_of_filling', 'date_of_last_payment', 'water_perk_date_of_filling'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'water_book_id' => 'Water Book ID',
            'int_water_private_code' => 'Int Water Private Code',
            'dec_water_rate_delivery' => 'Dec Water Rate Delivery',
            'dec_water_rate_drainage' => 'Dec Water Rate Drainage',
            'water_rate_delivery_date_of_filling' => 'Water Rate Delivery Date Of Filling',
            'water_rate_drainage_date_of_filling' => 'Water Rate Drainage Date Of Filling',
            'dec_counter_previous_coldwater' => 'Dec Counter Previous Coldwater',
            'dec_counter_previous_hotwater' => 'Dec Counter Previous Hotwater',
            'date_of_last_payment' => 'Date Of Last Payment',
            'dec_water_perk' => 'Dec Water Perk',
            'dec_water_perk_volume' => 'Dec Water Perk Volume',
            'water_perk_date_of_filling' => 'Water Perk Date Of Filling',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaybook()
    {
        return $this->hasOne(Paybook::className(), ['water_book_id' => 'water_book_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaterInvoices()
    {
        return $this->hasMany(WaterInvoice::className(), ['water_book_id' => 'water_book_id']);
    }
}
