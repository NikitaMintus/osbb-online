<?php

namespace backend\models\water;

use Yii;

/**
 * This is the model class for table "waterDrainageInfo".
 *
 * @property integer $water_drainage_info_id
 * @property string $dec_counter_current
 * @property string $dec_counter_previous
 * @property string $dec_substraction
 * @property integer $water_rate_id
 * @property string $dec_price_paid
 *
 * @property WaterInvoice[] $waterInvoices
 */
class WaterDrainageInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'waterDrainageInfo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dec_counter_current', 'dec_counter_previous', 'dec_substraction', 'water_rate_id', 'dec_price_paid'], 'required'],
            [['dec_counter_current', 'dec_counter_previous', 'dec_substraction', 'dec_price_paid'], 'number'],
            [['water_rate_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'water_drainage_info_id' => 'Water Drainage Info ID',
            'dec_counter_current' => 'Dec Counter Current',
            'dec_counter_previous' => 'Dec Counter Previous',
            'dec_substraction' => 'Dec Substraction',
            'water_rate_id' => 'Water Rate ID',
            'dec_price_paid' => 'Dec Price Paid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaterInvoices()
    {
        return $this->hasMany(WaterInvoice::className(), ['water_drainage_info_id' => 'water_drainage_info_id']);
    }
}
