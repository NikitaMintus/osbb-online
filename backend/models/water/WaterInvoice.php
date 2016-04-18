<?php

namespace backend\models\water;

use Yii;

/**
 * This is the model class for table "waterInvoice".
 *
 * @property integer $water_invoice_id
 * @property integer $water_book_id
 * @property string $adress
 * @property string $dec_water_rate_delivery
 * @property string $dec_water_rate_drainage
 * @property string $dec_counter_previous_coldwater
 * @property string $dec_counter_current_coldwater
 * @property string $dec_counter_previous_hotwater
 * @property string $dec_counter_current_hotwater
 * @property string $dec_sum
 * @property string $dec_water_perk
 * @property string $dec_total
 * @property string $date_of_payment
 *
 * @property WaterBook $waterBook
 */
class WaterInvoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'waterInvoice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['water_book_id', 'adress', 'dec_water_rate_delivery', 'dec_water_rate_drainage', 'dec_counter_previous_coldwater', 'dec_counter_current_coldwater', 'dec_counter_previous_hotwater', 'dec_counter_current_hotwater', 'dec_sum', 'dec_water_perk', 'dec_total', 'date_of_payment'], 'required'],
            [['water_book_id'], 'integer'],
            [['dec_water_rate_delivery', 'dec_water_rate_drainage', 'dec_counter_previous_coldwater', 'dec_counter_current_coldwater', 'dec_counter_previous_hotwater', 'dec_sum', 'dec_water_perk', 'dec_total'], 'number'],
            [['date_of_payment'], 'safe'],
            [['adress'], 'string', 'max' => 255],
            [['dec_counter_current_hotwater'], 'string', 'max' => 9],
            [['water_book_id'], 'exist', 'skipOnError' => true, 'targetClass' => WaterBook::className(), 'targetAttribute' => ['water_book_id' => 'water_book_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'water_invoice_id' => 'Water Invoice ID',
            'water_book_id' => 'Water Book ID',
            'adress' => 'Adress',
            'dec_water_rate_delivery' => 'Dec Water Rate Delivery',
            'dec_water_rate_drainage' => 'Dec Water Rate Drainage',
            'dec_counter_previous_coldwater' => 'Dec Counter Previous Coldwater',
            'dec_counter_current_coldwater' => 'Dec Counter Current Coldwater',
            'dec_counter_previous_hotwater' => 'Dec Counter Previous Hotwater',
            'dec_counter_current_hotwater' => 'Dec Counter Current Hotwater',
            'dec_sum' => 'Dec Sum',
            'dec_water_perk' => 'Dec Water Perk',
            'dec_total' => 'Dec Total',
            'date_of_payment' => 'Date Of Payment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaterBook()
    {
        return $this->hasOne(WaterBook::className(), ['water_book_id' => 'water_book_id']);
    }
}
