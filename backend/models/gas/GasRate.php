<?php

namespace backend\models\gas;

use Yii;

/**
 * This is the model class for table "gasRate".
 *
 * @property integer $gas_rate_id
 * @property string $dec_price
 * @property integer $int_number_of_decree
 * @property string $date_of_decree
 * @property string $date_of_filling
 *
 * @property GasBook[] $gasBooks
 */
class GasRate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gasRate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dec_price', 'int_number_of_decree', 'date_of_decree', 'date_of_filling'], 'required'],
            [['dec_price'], 'number'],
            [['int_number_of_decree'], 'integer'],
            [['date_of_decree', 'date_of_filling'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gas_rate_id' => 'Gas Rate ID',
            'dec_price' => 'Dec Price',
            'int_number_of_decree' => 'Int Number Of Decree',
            'date_of_decree' => 'Date Of Decree',
            'date_of_filling' => 'Date Of Filling',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGasBooks()
    {
        return $this->hasMany(GasBook::className(), ['gas_rate_id' => 'gas_rate_id']);
    }
}
