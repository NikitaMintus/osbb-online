<?php

namespace backend\models\heating;

use Yii;

/**
 * This is the model class for table "hotwaterInvoice".
 *
 * @property integer $hotwater_invoice_id
 * @property string $date_of_filling
 * @property integer $int_counter_current
 * @property integer $int_counter_previous
 * @property integer $int_substraction
 * @property integer $hotwater_rate_id
 * @property string $dec_sum
 * @property string $dec_fine
 * @property integer $hotwater_perk_id
 * @property string $dec_total
 *
 * @property HeatingBook[] $heatingBooks
 */
class HotwaterInvoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hotwaterInvoice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_of_filling', 'int_counter_current', 'int_counter_previous', 'int_substraction', 'hotwater_rate_id', 'dec_sum', 'dec_fine', 'hotwater_perk_id', 'dec_total'], 'required'],
            [['date_of_filling'], 'safe'],
            [['int_counter_current', 'int_counter_previous', 'int_substraction', 'hotwater_rate_id', 'hotwater_perk_id'], 'integer'],
            [['dec_sum', 'dec_fine', 'dec_total'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hotwater_invoice_id' => 'Hotwater Invoice ID',
            'date_of_filling' => 'Date Of Filling',
            'int_counter_current' => 'Int Counter Current',
            'int_counter_previous' => 'Int Counter Previous',
            'int_substraction' => 'Int Substraction',
            'hotwater_rate_id' => 'Hotwater Rate ID',
            'dec_sum' => 'Dec Sum',
            'dec_fine' => 'Dec Fine',
            'hotwater_perk_id' => 'Hotwater Perk ID',
            'dec_total' => 'Dec Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeatingBooks()
    {
        return $this->hasMany(HeatingBook::className(), ['hotwater_invoice_id' => 'hotwater_invoice_id']);
    }
}
