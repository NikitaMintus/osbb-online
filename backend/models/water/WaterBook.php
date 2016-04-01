<?php

namespace backend\models\water;

use Yii;

/**
 * This is the model class for table "waterBook".
 *
 * @property integer $water_book_id
 * @property integer $water_rate_id
 * @property integer $int_count_of_people
 * @property integer $water_perk_id
 * @property integer $water_invoice_id
 *
 * @property Paybook[] $paybooks
 * @property WaterInvoice $waterInvoice
 * @property WaterPerk $waterPerk
 * @property WaterRate $waterRate
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
            [['water_rate_id', 'int_count_of_people', 'water_perk_id', 'water_invoice_id'], 'required'],
            [['water_rate_id', 'int_count_of_people', 'water_perk_id', 'water_invoice_id'], 'integer'],
            [['water_invoice_id'], 'exist', 'skipOnError' => true, 'targetClass' => WaterInvoice::className(), 'targetAttribute' => ['water_invoice_id' => 'water_invoice_id']],
            [['water_perk_id'], 'exist', 'skipOnError' => true, 'targetClass' => WaterPerk::className(), 'targetAttribute' => ['water_perk_id' => 'water_perk_id']],
            [['water_rate_id'], 'exist', 'skipOnError' => true, 'targetClass' => WaterRate::className(), 'targetAttribute' => ['water_rate_id' => 'water_rate_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'water_book_id' => 'Water Book ID',
            'water_rate_id' => 'Water Rate ID',
            'int_count_of_people' => 'Int Count Of People',
            'water_perk_id' => 'Water Perk ID',
            'water_invoice_id' => 'Water Invoice ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaybooks()
    {
        return $this->hasMany(Paybook::className(), ['water_book_id' => 'water_book_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaterInvoice()
    {
        return $this->hasOne(WaterInvoice::className(), ['water_invoice_id' => 'water_invoice_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaterPerk()
    {
        return $this->hasOne(WaterPerk::className(), ['water_perk_id' => 'water_perk_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaterRate()
    {
        return $this->hasOne(WaterRate::className(), ['water_rate_id' => 'water_rate_id']);
    }
}
