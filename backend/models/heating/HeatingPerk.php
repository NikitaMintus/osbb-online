<?php

namespace backend\models\heating;

use Yii;

/**
 * This is the model class for table "heatingPerk".
 *
 * @property integer $heating_perk_id
 * @property integer $int_amount_of_perk_person
 * @property string $dec_perk
 * @property string $enum_category
 *
 * @property HeatingBook[] $heatingBooks
 */
class HeatingPerk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'heatingPerk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['int_amount_of_perk_person', 'dec_perk', 'enum_category'], 'required'],
            [['int_amount_of_perk_person'], 'integer'],
            [['dec_perk'], 'number'],
            [['enum_category'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'heating_perk_id' => 'Heating Perk ID',
            'int_amount_of_perk_person' => 'Int Amount Of Perk Person',
            'dec_perk' => 'Dec Perk',
            'enum_category' => 'Enum Category',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeatingBooks()
    {
        return $this->hasMany(HeatingBook::className(), ['heating_perk_id' => 'heating_perk_id']);
    }
}
