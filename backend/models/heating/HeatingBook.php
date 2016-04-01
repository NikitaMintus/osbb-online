<?php

namespace backend\models\heating;

use Yii;

/**
 * This is the model class for table "heatingBook".
 *
 * @property integer $heating_book_id
 * @property integer $heating_rate_id
 * @property integer $hotwater_rate_id
 * @property integer $heating_invoice_id
 * @property integer $hotwater_invoice_id
 * @property integer $heating_perk_id
 * @property integer $hotwater_perk_id
 *
 * @property HeatingInvoice $heatingInvoice
 * @property HeatingPerk $heatingPerk
 * @property HeatingRate $heatingRate
 * @property HotwaterInvoice $hotwaterInvoice
 * @property HotwaterPerk $hotwaterPerk
 * @property HotwaterRate $hotwaterRate
 * @property Paybook[] $paybooks
 */
class HeatingBook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'heatingBook';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['heating_book_id', 'heating_rate_id', 'hotwater_rate_id', 'heating_invoice_id', 'hotwater_invoice_id', 'heating_perk_id', 'hotwater_perk_id'], 'required'],
            [['heating_book_id', 'heating_rate_id', 'hotwater_rate_id', 'heating_invoice_id', 'hotwater_invoice_id', 'heating_perk_id', 'hotwater_perk_id'], 'integer'],
            [['heating_invoice_id'], 'exist', 'skipOnError' => true, 'targetClass' => HeatingInvoice::className(), 'targetAttribute' => ['heating_invoice_id' => 'heating_invoice_id']],
            [['heating_perk_id'], 'exist', 'skipOnError' => true, 'targetClass' => HeatingPerk::className(), 'targetAttribute' => ['heating_perk_id' => 'heating_perk_id']],
            [['heating_rate_id'], 'exist', 'skipOnError' => true, 'targetClass' => HeatingRate::className(), 'targetAttribute' => ['heating_rate_id' => 'heating_rate_id']],
            [['hotwater_invoice_id'], 'exist', 'skipOnError' => true, 'targetClass' => HotwaterInvoice::className(), 'targetAttribute' => ['hotwater_invoice_id' => 'hotwater_invoice_id']],
            [['hotwater_perk_id'], 'exist', 'skipOnError' => true, 'targetClass' => HotwaterPerk::className(), 'targetAttribute' => ['hotwater_perk_id' => 'hotwater_perk_id']],
            [['hotwater_rate_id'], 'exist', 'skipOnError' => true, 'targetClass' => HotwaterRate::className(), 'targetAttribute' => ['hotwater_rate_id' => 'hotwater_rate_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'heating_book_id' => 'Heating Book ID',
            'heating_rate_id' => 'Heating Rate ID',
            'hotwater_rate_id' => 'Hotwater Rate ID',
            'heating_invoice_id' => 'Heating Invoice ID',
            'hotwater_invoice_id' => 'Hotwater Invoice ID',
            'heating_perk_id' => 'Heating Perk ID',
            'hotwater_perk_id' => 'Hotwater Perk ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeatingInvoice()
    {
        return $this->hasOne(HeatingInvoice::className(), ['heating_invoice_id' => 'heating_invoice_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeatingPerk()
    {
        return $this->hasOne(HeatingPerk::className(), ['heating_perk_id' => 'heating_perk_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeatingRate()
    {
        return $this->hasOne(HeatingRate::className(), ['heating_rate_id' => 'heating_rate_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotwaterInvoice()
    {
        return $this->hasOne(HotwaterInvoice::className(), ['hotwater_invoice_id' => 'hotwater_invoice_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotwaterPerk()
    {
        return $this->hasOne(HotwaterPerk::className(), ['hotwater_perk_id' => 'hotwater_perk_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotwaterRate()
    {
        return $this->hasOne(HotwaterRate::className(), ['hotwater_rate_id' => 'hotwater_rate_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaybooks()
    {
        return $this->hasMany(Paybook::className(), ['heating_book_id' => 'heating_book_id']);
    }
}
