<?php

namespace backend\models\gas;

use Yii;

/**
 * This is the model class for table "gasBook".
 *
 * @property integer $gas_book_id
 * @property integer $gas_rate_id
 * @property integer $gas_perk_id
 * @property integer $gas_invoice_id
 *
 * @property GasInvoice $gasInvoice
 * @property GasPerk $gasPerk
 * @property GasRate $gasRate
 * @property Paybook[] $paybooks
 */
class GasBook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gasBook';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gas_rate_id', 'gas_perk_id', 'gas_invoice_id'], 'required'],
            [['gas_rate_id', 'gas_perk_id', 'gas_invoice_id'], 'integer'],
            [['gas_invoice_id'], 'exist', 'skipOnError' => true, 'targetClass' => GasInvoice::className(), 'targetAttribute' => ['gas_invoice_id' => 'gas_invoice_id']],
            [['gas_perk_id'], 'exist', 'skipOnError' => true, 'targetClass' => GasPerk::className(), 'targetAttribute' => ['gas_perk_id' => 'gas_perk_id']],
            [['gas_rate_id'], 'exist', 'skipOnError' => true, 'targetClass' => GasRate::className(), 'targetAttribute' => ['gas_rate_id' => 'gas_rate_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gas_book_id' => 'Gas Book ID',
            'gas_rate_id' => 'Gas Rate ID',
            'gas_perk_id' => 'Gas Perk ID',
            'gas_invoice_id' => 'Gas Invoice ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGasInvoice()
    {
        return $this->hasOne(GasInvoice::className(), ['gas_invoice_id' => 'gas_invoice_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGasPerk()
    {
        return $this->hasOne(GasPerk::className(), ['gas_perk_id' => 'gas_perk_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGasRate()
    {
        return $this->hasOne(GasRate::className(), ['gas_rate_id' => 'gas_rate_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaybooks()
    {
        return $this->hasMany(Paybook::className(), ['gas_book_id' => 'gas_book_id']);
    }
}
