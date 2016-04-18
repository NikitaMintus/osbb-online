<?php

namespace backend\models\heating;

use Yii;

/**
 * This is the model class for table "heatingBook".
 *
 * @property integer $heating_book_id
 * @property integer $int_heating_private_code
 * @property string $dec_hotwater_rate
 * @property string $dec_heating_rate
 * @property string $dec_hotwater_counter_previous
 * @property string $dec_heating_counter_previous
 * @property string $dec_hotwater_perk
 * @property string $dec_heating_perk
 * @property string $dec_hotwater_perk_volume
 * @property string $dec_heating_perk_volume
 * @property string $hotwater_perk_date_of_filling
 * @property string $heating_perk_date_of_filling
 * @property string $hotwater_rate_date_of_filling
 * @property string $heating_rate_date_of_filling
 * @property string $date_of_last_payment
 *
 * @property HeatingInvoice[] $heatingInvoices
 * @property HotwaterInvoice[] $hotwaterInvoices
 * @property Paybook $paybook
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
            [['heating_book_id', 'int_heating_private_code', 'dec_hotwater_rate', 'dec_heating_rate', 'dec_hotwater_counter_previous', 'dec_heating_counter_previous', 'dec_hotwater_perk', 'dec_heating_perk', 'dec_hotwater_perk_volume', 'dec_heating_perk_volume', 'hotwater_perk_date_of_filling', 'heating_perk_date_of_filling', 'hotwater_rate_date_of_filling', 'heating_rate_date_of_filling', 'date_of_last_payment'], 'required'],
            [['heating_book_id', 'int_heating_private_code'], 'integer'],
            [['dec_hotwater_rate', 'dec_heating_rate', 'dec_hotwater_counter_previous', 'dec_heating_counter_previous', 'dec_hotwater_perk', 'dec_heating_perk', 'dec_hotwater_perk_volume', 'dec_heating_perk_volume'], 'number'],
            [['hotwater_perk_date_of_filling', 'heating_perk_date_of_filling', 'hotwater_rate_date_of_filling', 'heating_rate_date_of_filling', 'date_of_last_payment'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'heating_book_id' => 'Heating Book ID',
            'int_heating_private_code' => 'Int Heating Private Code',
            'dec_hotwater_rate' => 'Dec Hotwater Rate',
            'dec_heating_rate' => 'Dec Heating Rate',
            'dec_hotwater_counter_previous' => 'Dec Hotwater Counter Previous',
            'dec_heating_counter_previous' => 'Dec Heating Counter Previous',
            'dec_hotwater_perk' => 'Dec Hotwater Perk',
            'dec_heating_perk' => 'Dec Heating Perk',
            'dec_hotwater_perk_volume' => 'Dec Hotwater Perk Volume',
            'dec_heating_perk_volume' => 'Dec Heating Perk Volume',
            'hotwater_perk_date_of_filling' => 'Hotwater Perk Date Of Filling',
            'heating_perk_date_of_filling' => 'Heating Perk Date Of Filling',
            'hotwater_rate_date_of_filling' => 'Hotwater Rate Date Of Filling',
            'heating_rate_date_of_filling' => 'Heating Rate Date Of Filling',
            'date_of_last_payment' => 'Date Of Last Payment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeatingInvoices()
    {
        return $this->hasMany(HeatingInvoice::className(), ['heating_book_id' => 'heating_book_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotwaterInvoices()
    {
        return $this->hasMany(HotwaterInvoice::className(), ['heating_book_id' => 'heating_book_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaybook()
    {
        return $this->hasOne(Paybook::className(), ['heating_book_id' => 'heating_book_id']);
    }
}
