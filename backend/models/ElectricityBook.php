<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "electricityBook".
 *
 * @property integer $electricity_book_id
 * @property integer $int_number_of_contract
 * @property integer $electricity_rate_id
 * @property integer $electricity_perk_id
 * @property integer $electricity_invoice_id
 *
 * @property ElectricityInvoice $electricityInvoice
 * @property ElectricityPerk $electricityPerk
 * @property ElectricityRate $electricityRate
 * @property Paybook[] $paybooks
 */
class ElectricityBook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'electricityBook';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['int_number_of_contract', 'electricity_rate_id', 'electricity_perk_id', 'electricity_invoice_id'], 'required'],
            [['int_number_of_contract', 'electricity_rate_id', 'electricity_perk_id', 'electricity_invoice_id'], 'integer'],
            [['electricity_invoice_id'], 'exist', 'skipOnError' => true, 'targetClass' => ElectricityInvoice::className(), 'targetAttribute' => ['electricity_invoice_id' => 'electricity_invoice_id']],
            [['electricity_perk_id'], 'exist', 'skipOnError' => true, 'targetClass' => ElectricityPerk::className(), 'targetAttribute' => ['electricity_perk_id' => 'electricity_perk_id']],
            [['electricity_rate_id'], 'exist', 'skipOnError' => true, 'targetClass' => ElectricityRate::className(), 'targetAttribute' => ['electricity_rate_id' => 'electricity_rate_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'electricity_book_id' => 'Electricity Book ID',
            'int_number_of_contract' => 'Int Number Of Contract',
            'electricity_rate_id' => 'Electricity Rate ID',
            'electricity_perk_id' => 'Electricity Perk ID',
            'electricity_invoice_id' => 'Electricity Invoice ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElectricityInvoice()
    {
        return $this->hasOne(ElectricityInvoice::className(), ['electricity_invoice_id' => 'electricity_invoice_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElectricityPerk()
    {
        return $this->hasOne(ElectricityPerk::className(), ['electricity_perk_id' => 'electricity_perk_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElectricityRate()
    {
        return $this->hasOne(ElectricityRate::className(), ['electricity_rate_id' => 'electricity_rate_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaybooks()
    {
        return $this->hasMany(Paybook::className(), ['electric_book_id' => 'electricity_book_id']);
    }
}
