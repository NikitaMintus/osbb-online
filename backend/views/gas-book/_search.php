<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\gas\GasBookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gas-book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'gas_book_id') ?>

    <?= $form->field($model, 'int_gas_personal_code') ?>

    <?= $form->field($model, 'dec_gas_rate') ?>

    <?= $form->field($model, 'gas_rate_date_of_filling') ?>

    <?= $form->field($model, 'dec_gas_perk') ?>

    <?php // echo $form->field($model, 'dec_perk_gas_volume') ?>

    <?php // echo $form->field($model, 'dec_counter_previous') ?>

    <?php // echo $form->field($model, 'date_of_last_payment') ?>

    <?php // echo $form->field($model, 'gas_perk_date_of_filling') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
