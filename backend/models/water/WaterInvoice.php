<?php

namespace backend\models\water;

use Yii;

/**
 * This is the model class for table "waterInvoice".
 *
 * @property integer $water_invoice_id
 * @property integer $water_delivery_info_id
 * @property integer $water_drainage_info_id
 * @property string $dec_sum
 * @property string $dec_fine
 * @property integer $water_perk_id
 * @property string $dec_total
 *
 * @property WaterBook[] $waterBooks
 * @property WaterDeliveryInfo $waterDeliveryInfo
 * @property WaterDrainageInfo $waterDrainageInfo
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
            [['water_delivery_info_id', 'water_drainage_info_id', 'dec_sum', 'dec_fine', 'water_perk_id', 'dec_total'], 'required'],
            [['water_delivery_info_id', 'water_drainage_info_id', 'water_perk_id'], 'integer'],
            [['dec_sum', 'dec_fine', 'dec_total'], 'number'],
            [['water_delivery_info_id'], 'exist', 'skipOnError' => true, 'targetClass' => WaterDeliveryInfo::className(), 'targetAttribute' => ['water_delivery_info_id' => 'water_delivery_info_id']],
            [['water_drainage_info_id'], 'exist', 'skipOnError' => true, 'targetClass' => WaterDrainageInfo::className(), 'targetAttribute' => ['water_drainage_info_id' => 'water_drainage_info_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'water_invoice_id' => 'Water Invoice ID',
            'water_delivery_info_id' => 'Water Delivery Info ID',
            'water_drainage_info_id' => 'Water Drainage Info ID',
            'dec_sum' => 'Dec Sum',
            'dec_fine' => 'Dec Fine',
            'water_perk_id' => 'Water Perk ID',
            'dec_total' => 'Dec Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaterBooks()
    {
        return $this->hasMany(WaterBook::className(), ['water_invoice_id' => 'water_invoice_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaterDeliveryInfo()
    {
        return $this->hasOne(WaterDeliveryInfo::className(), ['water_delivery_info_id' => 'water_delivery_info_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaterDrainageInfo()
    {
        return $this->hasOne(WaterDrainageInfo::className(), ['water_drainage_info_id' => 'water_drainage_info_id']);
    }
}
