<?php

namespace backend\models\gas;

use Yii;

/**
 * This is the model class for table "gasBook".
 *
 * @property integer $gas_book_id
 * @property integer $int_gas_personal_code
 * @property string $dec_gas_rate
 * @property string $gas_rate_date_of_filling
 * @property string $dec_gas_perk
 * @property string $dec_perk_gas_volume
 * @property string $dec_counter_previous
 * @property string $date_of_last_payment
 * @property string $gas_perk_date_of_filling
 *
 * @property GasInvoice[] $gasInvoices
 * @property Paybook $paybook
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
            [['int_gas_personal_code', 'dec_gas_rate', 'gas_rate_date_of_filling', 'dec_gas_perk', 'dec_perk_gas_volume', 'dec_counter_previous', 'date_of_last_payment', 'gas_perk_date_of_filling'], 'required'],
            [['int_gas_personal_code'], 'integer'],
            [['dec_gas_rate', 'dec_gas_perk', 'dec_perk_gas_volume', 'dec_counter_previous'], 'number'],
            [['gas_rate_date_of_filling', 'date_of_last_payment', 'gas_perk_date_of_filling'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gas_book_id' => 'Gas Book ID',
            'int_gas_personal_code' => 'Int Gas Personal Code',
            'dec_gas_rate' => 'Dec Gas Rate',
            'gas_rate_date_of_filling' => 'Gas Rate Date Of Filling',
            'dec_gas_perk' => 'Dec Gas Perk',
            'dec_perk_gas_volume' => 'Dec Perk Gas Volume',
            'dec_counter_previous' => 'Dec Counter Previous',
            'date_of_last_payment' => 'Date Of Last Payment',
            'gas_perk_date_of_filling' => 'Gas Perk Date Of Filling',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGasInvoices()
    {
        return $this->hasMany(GasInvoice::className(), ['gas_book_id' => 'gas_book_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaybook()
    {
        return $this->hasOne(Paybook::className(), ['gas_book_id' => 'gas_book_id']);
    }
}
