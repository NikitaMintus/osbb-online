<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\water\WaterBookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="water-book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'water_book_id') ?>

    <?= $form->field($model, 'int_water_private_code') ?>

    <?= $form->field($model, 'dec_water_rate_delivery') ?>

    <?= $form->field($model, 'dec_water_rate_drainage') ?>

    <?= $form->field($model, 'water_rate_delivery_date_of_filling') ?>

    <?php // echo $form->field($model, 'water_rate_drainage_date_of_filling') ?>

    <?php // echo $form->field($model, 'dec_counter_previous_coldwater') ?>

    <?php // echo $form->field($model, 'dec_counter_previous_hotwater') ?>

    <?php // echo $form->field($model, 'date_of_last_payment') ?>

    <?php // echo $form->field($model, 'dec_water_perk') ?>

    <?php // echo $form->field($model, 'dec_water_perk_volume') ?>

    <?php // echo $form->field($model, 'water_perk_date_of_filling') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
