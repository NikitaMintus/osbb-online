<?php

namespace backend\models\utilities;

use Yii;

/**
 * This is the model class for table "utilitiesBook".
 *
 * @property integer $utilities_book_id
 * @property integer $utlities_rate_id
 * @property integer $utilities_invoice_id
 * @property integer $utilities_perk_id
 *
 * @property Paybook[] $paybooks
 * @property UtilitiesInvoice $utilitiesInvoice
 * @property UtilitiesPerk $utilitiesPerk
 * @property UtilitiesRate $utlitiesRate
 */
class UtilitiesBook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'utilitiesBook';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['utlities_rate_id', 'utilities_invoice_id', 'utilities_perk_id'], 'required'],
            [['utlities_rate_id', 'utilities_invoice_id', 'utilities_perk_id'], 'integer'],
            [['utilities_invoice_id'], 'exist', 'skipOnError' => true, 'targetClass' => UtilitiesInvoice::className(), 'targetAttribute' => ['utilities_invoice_id' => 'utilities_invoice_id']],
            [['utilities_perk_id'], 'exist', 'skipOnError' => true, 'targetClass' => UtilitiesPerk::className(), 'targetAttribute' => ['utilities_perk_id' => 'utilities_perk_id']],
            [['utlities_rate_id'], 'exist', 'skipOnError' => true, 'targetClass' => UtilitiesRate::className(), 'targetAttribute' => ['utlities_rate_id' => 'utilities_rate_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'utilities_book_id' => 'Utilities Book ID',
            'utlities_rate_id' => 'Utlities Rate ID',
            'utilities_invoice_id' => 'Utilities Invoice ID',
            'utilities_perk_id' => 'Utilities Perk ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaybooks()
    {
        return $this->hasMany(Paybook::className(), ['utilities_book_id' => 'utilities_book_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtilitiesInvoice()
    {
        return $this->hasOne(UtilitiesInvoice::className(), ['utilities_invoice_id' => 'utilities_invoice_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtilitiesPerk()
    {
        return $this->hasOne(UtilitiesPerk::className(), ['utilities_perk_id' => 'utilities_perk_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtlitiesRate()
    {
        return $this->hasOne(UtilitiesRate::className(), ['utilities_rate_id' => 'utlities_rate_id']);
    }
}
