<?php

namespace backend\models\paybook;

use Yii;

/**
 * This is the model class for table "paybook".
 *
 * @property integer $paybook_id
 * @property integer $utilities_book_id
 * @property integer $gas_book_id
 * @property integer $water_book_id
 * @property integer $heating_book_id
 * @property integer $electric_book_id
 *
 * @property Flat[] $flats
 * @property ElectricityBook $electricBook
 * @property GasBook $gasBook
 * @property HeatingBook $heatingBook
 * @property UtilitiesBook $utilitiesBook
 * @property WaterBook $waterBook
 */
class Paybook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paybook';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['utilities_book_id', 'gas_book_id', 'water_book_id', 'heating_book_id', 'electric_book_id'], 'required'],
            [['utilities_book_id', 'gas_book_id', 'water_book_id', 'heating_book_id', 'electric_book_id'], 'integer'],
            [['electric_book_id'], 'exist', 'skipOnError' => true, 'targetClass' => ElectricityBook::className(), 'targetAttribute' => ['electric_book_id' => 'electricity_book_id']],
            [['gas_book_id'], 'exist', 'skipOnError' => true, 'targetClass' => GasBook::className(), 'targetAttribute' => ['gas_book_id' => 'gas_book_id']],
            [['heating_book_id'], 'exist', 'skipOnError' => true, 'targetClass' => HeatingBook::className(), 'targetAttribute' => ['heating_book_id' => 'heating_book_id']],
            [['utilities_book_id'], 'exist', 'skipOnError' => true, 'targetClass' => UtilitiesBook::className(), 'targetAttribute' => ['utilities_book_id' => 'utilities_book_id']],
            [['water_book_id'], 'exist', 'skipOnError' => true, 'targetClass' => WaterBook::className(), 'targetAttribute' => ['water_book_id' => 'water_book_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'paybook_id' => 'Paybook ID',
            'utilities_book_id' => 'Utilities Book ID',
            'gas_book_id' => 'Gas Book ID',
            'water_book_id' => 'Water Book ID',
            'heating_book_id' => 'Heating Book ID',
            'electric_book_id' => 'Electric Book ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlats()
    {
        return $this->hasMany(Flat::className(), ['paybook_id' => 'paybook_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElectricBook()
    {
        return $this->hasOne(ElectricityBook::className(), ['electricity_book_id' => 'electric_book_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGasBook()
    {
        return $this->hasOne(GasBook::className(), ['gas_book_id' => 'gas_book_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeatingBook()
    {
        return $this->hasOne(HeatingBook::className(), ['heating_book_id' => 'heating_book_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtilitiesBook()
    {
        return $this->hasOne(UtilitiesBook::className(), ['utilities_book_id' => 'utilities_book_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaterBook()
    {
        return $this->hasOne(WaterBook::className(), ['water_book_id' => 'water_book_id']);
    }
}
