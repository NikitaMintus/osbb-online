<?php

namespace backend\models\utilities;

use Yii;

/**
 * This is the model class for table "utilitiesBook".
 *
 * @property integer $utilities_book_id
 * @property integer $int_utilities_personal_code
 * @property string $dec_utlities_rate
 * @property string $utilities_rate_date_of_filling
 * @property string $dec_utilities_perk
 * @property string $utilities_perk_date_of_filling
 * @property string $dec_utilities_size_of_flat
 * @property string $utilities_date_of_last_payment
 *
 * @property Paybook $paybook
 * @property UtilitiesInvoice[] $utilitiesInvoices
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
            [['int_utilities_personal_code', 'dec_utlities_rate', 'utilities_rate_date_of_filling', 'dec_utilities_perk', 'utilities_perk_date_of_filling', 'dec_utilities_size_of_flat', 'utilities_date_of_last_payment'], 'required'],
            [['int_utilities_personal_code'], 'integer'],
            [['dec_utlities_rate', 'dec_utilities_perk', 'dec_utilities_size_of_flat'], 'number'],
            [['utilities_rate_date_of_filling', 'utilities_perk_date_of_filling', 'utilities_date_of_last_payment'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'utilities_book_id' => 'Utilities Book ID',
            'int_utilities_personal_code' => 'Int Utilities Personal Code',
            'dec_utlities_rate' => 'Dec Utlities Rate',
            'utilities_rate_date_of_filling' => 'Utilities Rate Date Of Filling',
            'dec_utilities_perk' => 'Dec Utilities Perk',
            'utilities_perk_date_of_filling' => 'Utilities Perk Date Of Filling',
            'dec_utilities_size_of_flat' => 'Dec Utilities Size Of Flat',
            'utilities_date_of_last_payment' => 'Utilities Date Of Last Payment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaybook()
    {
        return $this->hasOne(Paybook::className(), ['utilities_book_id' => 'utilities_book_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtilitiesInvoices()
    {
        return $this->hasMany(UtilitiesInvoice::className(), ['utilities_book_id' => 'utilities_book_id']);
    }
}
