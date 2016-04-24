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
            [['electric_book_id', 'adress', 'dec_counter_current', 'dec_counter_previous', 'dec_substraction', 'dec_amount_block1', 'dec_payment_block1', 'dec_amount_block2', 'dec_payment_block2', 'dec_amount_block3', 'dec_payment_block3', 'dec_sum', 'dec_electricity_perk', 'date_of_filling', 'dec_total'], 'required', 'message' => 'Это поле обязательно для заполнения'],
            [['electric_book_id'], 'integer'],
            [['dec_counter_current'], 'checkCounterCurrent'],
            [['dec_counter_current', 'dec_counter_previous', 'dec_substraction', 'dec_amount_block1', 'dec_payment_block1', 'dec_amount_block2', 'dec_payment_block2', 'dec_amount_block3', 'dec_payment_block3', 'dec_sum', 'dec_electricity_perk', 'dec_total'], 'number', 'message' => 'Это поле должно содержать только числа'],
            [['date_of_filling'], 'safe'],
            [['adress'], 'string', 'max' => 255],
            [['electric_book_id'], 'exist', 'skipOnError' => true, 'targetClass' => ElectricityBook::className(), 'targetAttribute' => ['electric_book_id' => 'electricity_book_id']],
        ];
    }

    public function checkCounterCurrent($attribute, $params)
    {
        $current = $this->dec_counter_current;
        $previous = $this->dec_counter_previous;
        if($previous > $current)
        {
            $this->addError($attribute, 'Текущие показатели должны быть больше предыдущих');
        }
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'electricity_invoice_id' => 'Electricity Invoice ID',
            'electric_book_id' => 'Electric Book ID',
            'adress' => 'Адрес',
            'dec_counter_current' => 'Текущие, кВт.час',
            'dec_counter_previous' => 'Предыдущие, кВт.час',
            'dec_substraction' => 'Использовано, кВт.час',
            'dec_amount_block1' => 'Блок 1, кВт.час',
            'dec_payment_block1' => 'Блок 1, грн',
            'dec_amount_block2' => 'Блок 2, кВт.час',
            'dec_payment_block2' => 'Блок 2, грн',
            'dec_amount_block3' => 'Блок 3, кВт.час',
            'dec_payment_block3' => 'Блок 3, грн',
            'dec_sum' => 'Сумма, грн',
            'dec_electricity_perk' => 'Льгота, грн',
            'date_of_filling' => 'Дата',
            'dec_total' => 'Всего, грн',
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
