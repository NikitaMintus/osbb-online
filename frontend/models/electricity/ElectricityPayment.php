<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 16.04.2016
 * Time: 21:00
 */

namespace frontend\models\electricity;


use yii\base\Model;

class ElectricityPayment extends Model
{
    public $fio;
    public $counter_previous;
    public $counter_current;
    public $substraction;
    public $sum;
    public $perk;
}