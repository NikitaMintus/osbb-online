<?php

namespace backend\models\heating;

use Yii;

/**
 * This is the model class for table "hotwaterRate".
 *
 * @property integer $hotwater_rate_id
 * @property string $dec_rate_person
 * @property string $dec_rate_metr2
 * @property string $date_of_decree
 * @property string $date_of_filling
 *
 * @property HeatingBook[] $heatingBooks
 */
class HotwaterRate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hotwaterRate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dec_rate_person', 'dec_rate_metr2', 'date_of_decree', 'date_of_filling'], 'required'],
            [['dec_rate_person', 'dec_rate_metr2'], 'number'],
            [['date_of_decree', 'date_of_filling'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hotwater_rate_id' => 'Hotwater Rate ID',
            'dec_rate_person' => 'Dec Rate Person',
            'dec_rate_metr2' => 'Dec Rate Metr2',
            'date_of_decree' => 'Date Of Decree',
            'date_of_filling' => 'Date Of Filling',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeatingBooks()
    {
        return $this->hasMany(HeatingBook::className(), ['hotwater_rate_id' => 'hotwater_rate_id']);
    }
}
