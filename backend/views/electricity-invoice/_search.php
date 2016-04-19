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

    <?= $form->field($model, 'electric_book_id') ?>

    <?= $form->field($model, 'adress') ?>

    <?= $form->field($model, 'dec_counter_current') ?>

    <?= $form->field($model, 'dec_counter_previous') ?>

    <?php // echo $form->field($model, 'dec_substraction') ?>

    <?php // echo $form->field($model, 'dec_amount_block1') ?>

    <?php // echo $form->field($model, 'dec_payment_block1') ?>

    <?php // echo $form->field($model, 'dec_amount_block2') ?>

    <?php // echo $form->field($model, 'dec_payment_block2') ?>

    <?php // echo $form->field($model, 'dec_amount_block3') ?>

    <?php // echo $form->field($model, 'dec_payment_block3') ?>

    <?php // echo $form->field($model, 'dec_sum') ?>

    <?php // echo $form->field($model, 'dec_electricity_perk') ?>

    <?php // echo $form->field($model, 'date_of_filling') ?>

    <?php // echo $form->field($model, 'dec_total') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
