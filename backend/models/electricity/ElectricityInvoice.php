<?php

namespace backend\models\electricity;

use Yii;

/**
 * This is the model class for table "electricityInvoice".
 *
 * @property integer $electricity_invoice_id
 * @property string $dec_counter_current
 * @property string $dec_counter_previous
 * @property string $dec_substraction
 * @property integer $electricity_catalog_rates_invoice_id
 * @property string $dec_sum
 * @property integer $electricity_perk_id
 * @property string $dec_fine
 * @property string $date_of_filling
 * @property string $dec_total
 *
 * @property ElectricityBook[] $electricityBooks
 * @property ElectricityCatalogRatesInvoice $electricityCatalogRatesInvoice
 */
class ElectricityInvoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'electricityInvoice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dec_counter_current', 'dec_counter_previous', 'dec_substraction', 'electricity_catalog_rates_invoice_id', 'dec_sum', 'electricity_perk_id', 'dec_fine', 'date_of_filling', 'dec_total'], 'required'],
            [['dec_counter_current', 'dec_counter_previous', 'dec_substraction', 'dec_sum', 'dec_fine', 'dec_total'], 'number'],
            [['electricity_catalog_rates_invoice_id', 'electricity_perk_id'], 'integer'],
            [['date_of_filling'], 'safe'],
            [['electricity_catalog_rates_invoice_id'], 'exist', 'skipOnError' => true, 'targetClass' => ElectricityCatalogRatesInvoice::className(), 'targetAttribute' => ['electricity_catalog_rates_invoice_id' => 'electricity_catalog_rates_invoice_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'electricity_invoice_id' => 'Electricity Invoice ID',
            'dec_counter_current' => 'Dec Counter Current',
            'dec_counter_previous' => 'Dec Counter Previous',
            'dec_substraction' => 'Dec Substraction',
            'electricity_catalog_rates_invoice_id' => 'Electricity Catalog Rates Invoice ID',
            'dec_sum' => 'Dec Sum',
            'electricity_perk_id' => 'Electricity Perk ID',
            'dec_fine' => 'Dec Fine',
            'date_of_filling' => 'Date Of Filling',
            'dec_total' => 'Dec Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElectricityBooks()
    {
        return $this->hasMany(ElectricityBook::className(), ['electricity_invoice_id' => 'electricity_invoice_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElectricityCatalogRatesInvoice()
    {
        return $this->hasOne(ElectricityCatalogRatesInvoice::className(), ['electricity_catalog_rates_invoice_id' => 'electricity_catalog_rates_invoice_id']);
    }
}
