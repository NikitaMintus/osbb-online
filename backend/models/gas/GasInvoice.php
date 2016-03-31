<?php

namespace backend\models\gas;

use Yii;

/**
 * This is the model class for table "gasInvoice".
 *
 * @property integer $gas_invoice_id
 * @property double $fl_counter_current
 * @property double $fl_counter_previous
 * @property double $fl_subtraction
 * @property integer $gas_rate_id
 * @property double $fl_sum
 * @property string $date
 * @property double $fl_fine
 * @property integer $gas_perk_id
 * @property double $fl_total
 *
 * @property GasBook[] $gasBooks
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
            [['fl_counter_current', 'fl_counter_previous', 'fl_subtraction', 'gas_rate_id', 'fl_sum', 'date', 'fl_total'], 'required'],
            [['fl_counter_current', 'fl_counter_previous', 'fl_subtraction', 'fl_sum', 'fl_fine', 'fl_total'], 'number'],
            [['gas_rate_id', 'gas_perk_id'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gas_invoice_id' => 'Gas Invoice ID',
            'fl_counter_current' => 'Fl Counter Current',
            'fl_counter_previous' => 'Fl Counter Previous',
            'fl_subtraction' => 'Fl Subtraction',
            'gas_rate_id' => 'Gas Rate ID',
            'fl_sum' => 'Fl Sum',
            'date' => 'Date',
            'fl_fine' => 'Fl Fine',
            'gas_perk_id' => 'Gas Perk ID',
            'fl_total' => 'Fl Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGasBooks()
    {
        return $this->hasMany(GasBook::className(), ['gas_invoice_id' => 'gas_invoice_id']);
    }
}
