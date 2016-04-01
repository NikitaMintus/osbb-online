<?php

namespace backend\models\utilities;

use Yii;

/**
 * This is the model class for table "utilitiesPerk".
 *
 * @property integer $utilities_perk_id
 * @property string $dec_perk
 * @property string $date_of_filling
 *
 * @property UtilitiesBook[] $utilitiesBooks
 */
class UtilitiesPerk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'utilitiesPerk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dec_perk', 'date_of_filling'], 'required'],
            [['dec_perk'], 'number'],
            [['date_of_filling'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'utilities_perk_id' => 'Utilities Perk ID',
            'dec_perk' => 'Dec Perk',
            'date_of_filling' => 'Date Of Filling',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtilitiesBooks()
    {
        return $this->hasMany(UtilitiesBook::className(), ['utilities_perk_id' => 'utilities_perk_id']);
    }
}
