<?php

namespace backend\models\electricity;

use Yii;

/**
 * This is the model class for table "electricityBook".
 *
 * @property integer $electricity_book_id
 * @property integer $int_number_of_personal_code
 * @property string $dec_rate_block1
 * @property integer $int_rate_block1_limit
 * @property string $dec_rate_block2
 * @property integer $int_rate_block2_limit
 * @property string $dec_rate_block3
 * @property integer $int_rate_block3_limit
 * @property string $dec_electric_perk
 * @property integer $dec_electric_perk_limit
 * @property string $electric_rate_date_of_filling
 * @property string $electric_perk_date_of_filling
 * @property string $electric_date_of_last_payment
 *
 * @property ElectricityInvoice[] $electricityInvoices
 * @property Paybook $paybook
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
            [['int_number_of_personal_code', 'dec_rate_block1', 'int_rate_block1_limit', 'dec_rate_block2', 'int_rate_block2_limit', 'dec_rate_block3', 'int_rate_block3_limit', 'dec_electric_perk', 'dec_electric_perk_limit', 'electric_rate_date_of_filling', 'electric_perk_date_of_filling', 'electric_date_of_last_payment'], 'required'],
            [['int_number_of_personal_code', 'int_rate_block1_limit', 'int_rate_block2_limit', 'int_rate_block3_limit', 'dec_electric_perk_limit'], 'integer'],
            [['dec_rate_block1', 'dec_rate_block2', 'dec_rate_block3', 'dec_electric_perk'], 'number'],
            [['electric_rate_date_of_filling', 'electric_perk_date_of_filling', 'electric_date_of_last_payment'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'electricity_book_id' => 'Electricity Book ID',
            'int_number_of_personal_code' => 'Int Number Of Personal Code',
            'dec_rate_block1' => 'Dec Rate Block1',
            'int_rate_block1_limit' => 'Int Rate Block1 Limit',
            'dec_rate_block2' => 'Dec Rate Block2',
            'int_rate_block2_limit' => 'Int Rate Block2 Limit',
            'dec_rate_block3' => 'Dec Rate Block3',
            'int_rate_block3_limit' => 'Int Rate Block3 Limit',
            'dec_electric_perk' => 'Dec Electric Perk',
            'dec_electric_perk_limit' => 'Dec Electric Perk Limit',
            'electric_rate_date_of_filling' => 'Electric Rate Date Of Filling',
            'electric_perk_date_of_filling' => 'Electric Perk Date Of Filling',
            'electric_date_of_last_payment' => 'Electric Date Of Last Payment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElectricityInvoices()
    {
        return $this->hasMany(ElectricityInvoice::className(), ['electric_book_id' => 'electricity_book_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaybook()
    {
        return $this->hasOne(Paybook::className(), ['electric_book_id' => 'electricity_book_id']);
    }
}
