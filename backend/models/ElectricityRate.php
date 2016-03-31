<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "electricityRate".
 *
 * @property integer $electricity_rate_id
 * @property integer $electricity_block_rate_id
 * @property string $date_of_filling
 * @property string $date_of_degree
 *
 * @property ElectricityBook[] $electricityBooks
 * @property ElectricityBlockRate $electricityBlockRate
 */
class ElectricityRate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'electricityRate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['electricity_block_rate_id', 'date_of_filling', 'date_of_degree'], 'required'],
            [['electricity_block_rate_id'], 'integer'],
            [['date_of_filling', 'date_of_degree'], 'safe'],
            [['electricity_block_rate_id'], 'exist', 'skipOnError' => true, 'targetClass' => ElectricityBlockRate::className(), 'targetAttribute' => ['electricity_block_rate_id' => 'electricity_block_rate_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'electricity_rate_id' => 'Electricity Rate ID',
            'electricity_block_rate_id' => 'Electricity Block Rate ID',
            'date_of_filling' => 'Date Of Filling',
            'date_of_degree' => 'Date Of Degree',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElectricityBooks()
    {
        return $this->hasMany(ElectricityBook::className(), ['electricity_rate_id' => 'electricity_rate_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElectricityBlockRate()
    {
        return $this->hasOne(ElectricityBlockRate::className(), ['electricity_block_rate_id' => 'electricity_block_rate_id']);
    }
}
