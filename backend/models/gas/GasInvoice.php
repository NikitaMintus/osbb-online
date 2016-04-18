<?php

namespace backend\models\gas;

use Yii;

/**
 * This is the model class for table "gasInvoice".
 *
 * @property integer $gas_invoice_id
 * @property integer $gas_book_id
 * @property string $adress
 * @property string $dec_counter_current
 * @property string $dec_counter_previous
 * @property string $dec_subtraction
 * @property string $dec_rate
 * @property string $dec_sum
 * @property string $dec_perk
 * @property string $date_of_payment
 * @property string $dec_total
 *
 * @property GasBook $gasBook
 */
class GasInvoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gasInvoice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gas_book_id', 'adress', 'dec_counter_current', 'dec_counter_previous', 'dec_subtraction', 'dec_rate', 'dec_sum', 'dec_perk', 'date_of_payment', 'dec_total'], 'required'],
            [['gas_book_id'], 'integer'],
            [['dec_counter_current', 'dec_counter_previous', 'dec_subtraction', 'dec_rate', 'dec_sum', 'dec_perk', 'dec_total'], 'number'],
            [['date_of_payment'], 'safe'],
            [['adress'], 'string', 'max' => 255],
            [['gas_book_id'], 'exist', 'skipOnError' => true, 'targetClass' => GasBook::className(), 'targetAttribute' => ['gas_book_id' => 'gas_book_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gas_invoice_id' => 'Gas Invoice ID',
            'gas_book_id' => 'Gas Book ID',
            'adress' => 'Adress',
            'dec_counter_current' => 'Dec Counter Current',
            'dec_counter_previous' => 'Dec Counter Previous',
            'dec_subtraction' => 'Dec Subtraction',
            'dec_rate' => 'Dec Rate',
            'dec_sum' => 'Dec Sum',
            'dec_perk' => 'Dec Perk',
            'date_of_payment' => 'Date Of Payment',
            'dec_total' => 'Dec Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGasBook()
    {
        return $this->hasOne(GasBook::className(), ['gas_book_id' => 'gas_book_id']);
    }
}
