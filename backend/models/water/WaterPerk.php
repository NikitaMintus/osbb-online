<?php

namespace backend\models\water;

use Yii;

/**
 * This is the model class for table "waterPerk".
 *
 * @property integer $water_perk_id
 * @property integer $int_count_of_person
 * @property integer $int_perk_percent
 * @property string $str_category
 *
 * @property WaterBook[] $waterBooks
 */
class WaterPerk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'waterPerk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['water_perk_id', 'int_count_of_person', 'int_perk_percent', 'str_category'], 'required'],
            [['water_perk_id', 'int_count_of_person', 'int_perk_percent'], 'integer'],
            [['str_category'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'water_perk_id' => 'Water Perk ID',
            'int_count_of_person' => 'Int Count Of Person',
            'int_perk_percent' => 'Int Perk Percent',
            'str_category' => 'Str Category',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaterBooks()
    {
        return $this->hasMany(WaterBook::className(), ['water_perk_id' => 'water_perk_id']);
    }
}
