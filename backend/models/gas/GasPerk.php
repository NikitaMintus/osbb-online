<?php

namespace backend\models\gas;

use Yii;

/**
 * This is the model class for table "gasPerk".
 *
 * @property integer $gas_perk_id
 * @property string $dec_perk
 * @property string $enum_season
 * @property integer $int_gas_volume
 * @property string $date_of_filling
 *
 * @property GasBook[] $gasBooks
 */
class GasPerk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gasPerk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dec_perk', 'int_gas_volume', 'date_of_filling'], 'required'],
            [['dec_perk'], 'number'],
            [['enum_season'], 'string'],
            [['int_gas_volume'], 'integer'],
            [['date_of_filling'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gas_perk_id' => 'Gas Perk ID',
            'dec_perk' => 'Dec Perk',
            'enum_season' => 'Enum Season',
            'int_gas_volume' => 'Int Gas Volume',
            'date_of_filling' => 'Date Of Filling',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGasBooks()
    {
        return $this->hasMany(GasBook::className(), ['gas_perk_id' => 'gas_perk_id']);
    }
}
