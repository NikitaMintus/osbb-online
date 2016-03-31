<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\electricity\ElectricityInvoiceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="electricity-invoice-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'electricity_invoice_id') ?>

    <?= $form->field($model, 'dec_counter_current') ?>

    <?= $form->field($model, 'dec_counter_previous') ?>

    <?= $form->field($model, 'dec_substraction') ?>

    <?= $form->field($model, 'electricity_catalog_rates_invoice_id') ?>

    <?php // echo $form->field($model, 'dec_sum') ?>

    <?php // echo $form->field($model, 'electricity_perk_id') ?>

    <?php // echo $form->field($model, 'dec_fine') ?>

    <?php // echo $form->field($model, 'date_of_filling') ?>

    <?php // echo $form->field($model, 'dec_total') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
