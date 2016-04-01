<?php

namespace backend\models\utilities;

use Yii;

/**
 * This is the model class for table "utilitiesRate".
 *
 * @property integer $utilities_rate_id
 * @property string $dec_price
 * @property string $date_of_filling
 *
 * @property UtilitiesBook[] $utilitiesBooks
 */
class UtilitiesRate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'utilitiesRate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dec_price', 'date_of_filling'], 'required'],
            [['dec_price'], 'number'],
            [['date_of_filling'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'utilities_rate_id' => 'Utilities Rate ID',
            'dec_price' => 'Dec Price',
            'date_of_filling' => 'Date Of Filling',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtilitiesBooks()
    {
        return $this->hasMany(UtilitiesBook::className(), ['utlities_rate_id' => 'utilities_rate_id']);
    }
}
