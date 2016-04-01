<?php

namespace backend\models\utilities;

use Yii;

/**
 * This is the model class for table "utilitiesInvoice".
 *
 * @property integer $utilities_invoice_id
 * @property integer $utilities_rate_id
 * @property integer $utilities_perk_id
 * @property string $dec_fine
 * @property string $dec_total
 *
 * @property UtilitiesBook[] $utilitiesBooks
 */
class UtilitiesInvoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'utilitiesInvoice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['utilities_rate_id', 'utilities_perk_id', 'dec_total'], 'required'],
            [['utilities_rate_id', 'utilities_perk_id'], 'integer'],
            [['dec_fine', 'dec_total'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'utilities_invoice_id' => 'Utilities Invoice ID',
            'utilities_rate_id' => 'Utilities Rate ID',
            'utilities_perk_id' => 'Utilities Perk ID',
            'dec_fine' => 'Dec Fine',
            'dec_total' => 'Dec Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtilitiesBooks()
    {
        return $this->hasMany(UtilitiesBook::className(), ['utilities_invoice_id' => 'utilities_invoice_id']);
    }
}
