<?php

namespace backend\models\heating;

use Yii;

/**
 * This is the model class for table "heatingInvoice".
 *
 * @property integer $heating_invoice_id
 * @property string $date_of_filling
 * @property integer $int_counter_current
 * @property integer $int_counter_previous
 * @property integer $int_substraction
 * @property integer $heating_rate_id
 * @property string $dec_sum
 * @property string $dec_fine
 * @property integer $heating_perk_id
 * @property string $dec_total
 *
 * @property HeatingBook[] $heatingBooks
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
            [['date_of_filling', 'int_counter_current', 'int_counter_previous', 'int_substraction', 'heating_rate_id', 'dec_sum', 'dec_fine', 'heating_perk_id', 'dec_total'], 'required'],
            [['date_of_filling'], 'safe'],
            [['int_counter_current', 'int_counter_previous', 'int_substraction', 'heating_rate_id', 'heating_perk_id'], 'integer'],
            [['dec_sum', 'dec_fine', 'dec_total'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'heating_invoice_id' => 'Heating Invoice ID',
            'date_of_filling' => 'Date Of Filling',
            'int_counter_current' => 'Int Counter Current',
            'int_counter_previous' => 'Int Counter Previous',
            'int_substraction' => 'Int Substraction',
            'heating_rate_id' => 'Heating Rate ID',
            'dec_sum' => 'Dec Sum',
            'dec_fine' => 'Dec Fine',
            'heating_perk_id' => 'Heating Perk ID',
            'dec_total' => 'Dec Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeatingBooks()
    {
        return $this->hasMany(HeatingBook::className(), ['heating_invoice_id' => 'heating_invoice_id']);
    }
}
