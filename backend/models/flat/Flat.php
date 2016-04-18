<?php

namespace backend\models\flat;

use common\models\User;
use Yii;

/**
 * This is the model class for table "flat".
 *
 * @property integer $flat_id
 * @property integer $paybook_id
 * @property integer $block
 * @property integer $floor
 * @property double $size_of_flat
 * @property string $adress
 * @property integer $user_id
 *
 * @property Paybook $paybook
 * @property User $user
 */
class Flat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
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
            [['flat_id', 'paybook_id', 'block', 'floor', 'size_of_flat', 'adress', 'user_id'], 'required'],
            [['flat_id', 'paybook_id', 'block', 'floor', 'user_id'], 'integer'],
            [['size_of_flat'], 'number'],
            [['adress'], 'string', 'max' => 255],
            [['paybook_id'], 'exist', 'skipOnError' => true, 'targetClass' => Paybook::className(), 'targetAttribute' => ['paybook_id' => 'paybook_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'flat_id' => 'Flat ID',
            'paybook_id' => 'Paybook ID',
            'block' => 'Block',
            'floor' => 'Floor',
            'size_of_flat' => 'Size Of Flat',
            'adress' => 'Adress',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaybook()
    {
        return $this->hasOne(Paybook::className(), ['paybook_id' => 'paybook_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
