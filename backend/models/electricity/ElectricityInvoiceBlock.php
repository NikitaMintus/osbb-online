<?php

namespace backend\models\electricity;

use Yii;

/**
 * This is the model class for table "electricityInvoiceBlock".
 *
 * @property integer $electricity_invoice_block_id
 * @property string $dec_kwt_hour
 * @property string $dec_price_paid
 *
 * @property ElectricityCatalogRatesInvoice[] $electricityCatalogRatesInvoices
 */
class ElectricityInvoiceBlock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'electricityInvoiceBlock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['electricity_invoice_block_id', 'dec_kwt_hour', 'dec_price_paid'], 'required'],
            [['electricity_invoice_block_id'], 'integer'],
            [['dec_kwt_hour', 'dec_price_paid'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'electricity_invoice_block_id' => 'Electricity Invoice Block ID',
            'dec_kwt_hour' => 'Dec Kwt Hour',
            'dec_price_paid' => 'Dec Price Paid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElectricityCatalogRatesInvoices()
    {
        return $this->hasMany(ElectricityCatalogRatesInvoice::className(), ['electricity_invoice_block_id' => 'electricity_invoice_block_id']);
    }
}
