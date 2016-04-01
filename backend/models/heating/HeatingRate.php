<?php

namespace backend\models\heating;

use Yii;

/**
 * This is the model class for table "heatingRate".
 *
 * @property integer $heating_rate_id
 * @property string $dec_price_gkal
 * @property string $dec_price_metr2
 * @property string $date_of_decree
 * @property string $date_of_filling
 *
 * @property HeatingBook[] $heatingBooks
 */
class HeatingRate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'heatingRate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dec_price_gkal', 'dec_price_metr2', 'date_of_decree', 'date_of_filling'], 'required'],
            [['dec_price_gkal', 'dec_price_metr2'], 'number'],
            [['date_of_decree', 'date_of_filling'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'heating_rate_id' => 'Heating Rate ID',
            'dec_price_gkal' => 'Dec Price Gkal',
            'dec_price_metr2' => 'Dec Price Metr2',
            'date_of_decree' => 'Date Of Decree',
            'date_of_filling' => 'Date Of Filling',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeatingBooks()
    {
        return $this->hasMany(HeatingBook::className(), ['heating_rate_id' => 'heating_rate_id']);
    }
}
