<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\electricity\ElectricityInvoiceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="electricity-invoice-search">

    <?php $form = ActiveForm::begin([
        'action' => ['invoices'],
        'method' => 'get',
    ]); ?>

    <? $form->field($model, 'date_of_filling') ?>

<!--    --><?// $form->field($model, 'dec_counter_current') ?>
<!---->
<!--    --><?// $form->field($model, 'dec_counter_previous') ?>

    <? $form->field($model, 'dec_substraction') ?>

    <? $form->field($model, 'dec_electricity_perk') ?>

    <? $form->field($model, 'dec_total') ?>


    <div class="form-group">
        <? Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <? Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
