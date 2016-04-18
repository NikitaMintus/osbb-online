<?php

namespace backend\models\heating;

use Yii;

/**
 * This is the model class for table "heatingInvoice".
 *
 * @property integer $heating_invoice_id
 * @property integer $heating_book_id
 * @property string $adress
 * @property string $dec_counter_current
 * @property string $dec_counter_previous
 * @property string $dec_heating_rate
 * @property string $dec_sum
 * @property string $dec_heating_perk
 * @property string $dec_total
 * @property string $date_of_payment
 *
 * @property HeatingBook $heatingBook
 */
class HeatingInvoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'heatingInvoice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['heating_book_id', 'adress', 'dec_counter_current', 'dec_counter_previous', 'dec_heating_rate', 'dec_sum', 'dec_heating_perk', 'dec_total', 'date_of_payment'], 'required'],
            [['heating_book_id'], 'integer'],
            [['dec_counter_current', 'dec_counter_previous', 'dec_heating_rate', 'dec_sum', 'dec_heating_perk', 'dec_total'], 'number'],
            [['date_of_payment'], 'safe'],
            [['adress'], 'string', 'max' => 255],
            [['heating_book_id'], 'exist', 'skipOnError' => true, 'targetClass' => HeatingBook::className(), 'targetAttribute' => ['heating_book_id' => 'heating_book_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'heating_invoice_id' => 'Heating Invoice ID',
            'heating_book_id' => 'Heating Book ID',
            'adress' => 'Adress',
            'dec_counter_current' => 'Dec Counter Current',
            'dec_counter_previous' => 'Dec Counter Previous',
            'dec_heating_rate' => 'Dec Heating Rate',
            'dec_sum' => 'Dec Sum',
            'dec_heating_perk' => 'Dec Heating Perk',
            'dec_total' => 'Dec Total',
            'date_of_payment' => 'Date Of Payment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeatingBook()
    {
        return $this->hasOne(HeatingBook::className(), ['heating_book_id' => 'heating_book_id']);
    }
}
