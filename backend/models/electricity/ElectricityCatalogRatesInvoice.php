<?php

namespace backend\models\electricity;

use Yii;

/**
 * This is the model class for table "electricityCatalogRatesInvoice".
 *
 * @property integer $electricity_catalog_rates_invoice_id
 * @property integer $electricity_invoice_block_id
 *
 * @property ElectricityInvoiceBlock $electricityInvoiceBlock
 * @property ElectricityInvoice[] $electricityInvoices
 */
class ElectricityCatalogRatesInvoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'electricityCatalogRatesInvoice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['electricity_catalog_rates_invoice_id', 'electricity_invoice_block_id'], 'required'],
            [['electricity_catalog_rates_invoice_id', 'electricity_invoice_block_id'], 'integer'],
            [['electricity_invoice_block_id'], 'exist', 'skipOnError' => true, 'targetClass' => ElectricityInvoiceBlock::className(), 'targetAttribute' => ['electricity_invoice_block_id' => 'electricity_invoice_block_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'electricity_catalog_rates_invoice_id' => 'Electricity Catalog Rates Invoice ID',
            'electricity_invoice_block_id' => 'Electricity Invoice Block ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElectricityInvoiceBlock()
    {
        return $this->hasOne(ElectricityInvoiceBlock::className(), ['electricity_invoice_block_id' => 'electricity_invoice_block_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElectricityInvoices()
    {
        return $this->hasMany(ElectricityInvoice::className(), ['electricity_catalog_rates_invoice_id' => 'electricity_catalog_rates_invoice_id']);
    }
}
