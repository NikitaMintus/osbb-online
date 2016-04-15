<?php

namespace backend\models\flat;

use Yii;

/**
 * This is the model class for table "flat".
 *
 * @property integer $flat_id
 * @property integer $paybook_id
 * @property integer $owner_id
 * @property integer $block
 * @property integer $floor
 * @property double $size_of_flat
 * @property string $adress
 *
 * @property CatalogOfDomicile[] $catalogOfDomiciles
 * @property Owner $owner
 * @property Paybook $paybook
 */
class Flat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $ownerPersonId;

    public static function tableName()
    {
        return 'flat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['flat_id', 'paybook_id', 'owner_id', 'block', 'floor', 'size_of_flat', 'adress'], 'required'],
            [['flat_id', 'paybook_id', 'owner_id', 'block', 'floor'], 'integer'],
            [['size_of_flat'], 'number'],
            [['adress'], 'string', 'max' => 255],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Owner::className(), 'targetAttribute' => ['owner_id' => 'owner_id']],
            [['paybook_id'], 'exist', 'skipOnError' => true, 'targetClass' => Paybook::className(), 'targetAttribute' => ['paybook_id' => 'paybook_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'flat_id' => 'Номер квартиры',
            'paybook_id' => 'Paybook ID',
            'owner_id' => 'Owner ID',
            'block' => 'Номер подъезда',
            'floor' => 'Этаж',
            'size_of_flat' => 'Размер квартиры',
            'adress' => 'Адрес',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogOfDomiciles()
    {
        return $this->hasMany(CatalogOfDomicile::className(), ['flat_id' => 'flat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(Owner::className(), ['owner_id' => 'owner_id']);
    }

//    public function setOwner($personId)
//    {
//        $this->owner->person_id = $personId;
//    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaybook()
    {
        return $this->hasOne(Paybook::className(), ['paybook_id' => 'paybook_id']);
    }
}
