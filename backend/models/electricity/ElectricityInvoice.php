<?php

namespace backend\models\electricity;

use Yii;

/**
 * This is the model class for table "electricityInvoice".
 *
 * @property integer $electricity_invoice_id
 * @property integer $electric_book_id
 * @property string $adress
 * @property string $dec_counter_current
 * @property string $dec_counter_previous
 * @property string $dec_substraction
 * @property string $dec_amount_block1
 * @property string $dec_payment_block1
 * @property string $dec_amount_block2
 * @property string $dec_payment_block2
 * @property string $dec_amount_block3
 * @property string $dec_payment_block3
 * @property string $dec_sum
 * @property string $dec_electricity_perk
 * @property string $date_of_filling
 * @property string $dec_total
 *
 * @property ElectricityBook $electricBook
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
            [['electric_book_id', 'adress', 'dec_counter_current', 'dec_counter_previous', 'dec_substraction', 'dec_amount_block1', 'dec_payment_block1', 'dec_amount_block2', 'dec_payment_block2', 'dec_amount_block3', 'dec_payment_block3', 'dec_sum', 'dec_electricity_perk', 'date_of_filling', 'dec_total'], 'required'],
            [['electric_book_id'], 'integer'],
            [['dec_counter_current', 'dec_counter_previous', 'dec_substraction', 'dec_amount_block1', 'dec_payment_block1', 'dec_amount_block2', 'dec_payment_block2', 'dec_amount_block3', 'dec_payment_block3', 'dec_sum', 'dec_electricity_perk', 'dec_total'], 'number'],
            [['date_of_filling'], 'safe'],
            [['adress'], 'string', 'max' => 255],
            [['electric_book_id'], 'exist', 'skipOnError' => true, 'targetClass' => ElectricityBook::className(), 'targetAttribute' => ['electric_book_id' => 'electricity_book_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'electricity_invoice_id' => 'Electricity Invoice ID',
            'electric_book_id' => 'Electric Book ID',
            'adress' => 'Adress',
            'dec_counter_current' => 'Dec Counter Current',
            'dec_counter_previous' => 'Dec Counter Previous',
            'dec_substraction' => 'Dec Substraction',
            'dec_amount_block1' => 'Dec Amount Block1',
            'dec_payment_block1' => 'Dec Payment Block1',
            'dec_amount_block2' => 'Dec Amount Block2',
            'dec_payment_block2' => 'Dec Payment Block2',
            'dec_amount_block3' => 'Dec Amount Block3',
            'dec_payment_block3' => 'Dec Payment Block3',
            'dec_sum' => 'Dec Sum',
            'dec_electricity_perk' => 'Dec Electricity Perk',
            'date_of_filling' => 'Date Of Filling',
            'dec_total' => 'Dec Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElectricBook()
    {
        return $this->hasOne(ElectricityBook::className(), ['electricity_book_id' => 'electric_book_id']);
    }
}
