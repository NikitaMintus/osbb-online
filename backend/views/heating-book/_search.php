<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\heating\HeatingBookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="heating-book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'heating_book_id') ?>

    <?= $form->field($model, 'int_heating_private_code') ?>

    <?= $form->field($model, 'dec_hotwater_rate') ?>

    <?= $form->field($model, 'dec_heating_rate') ?>

    <?= $form->field($model, 'dec_hotwater_counter_previous') ?>

    <?php // echo $form->field($model, 'dec_heating_counter_previous') ?>

    <?php // echo $form->field($model, 'dec_hotwater_perk') ?>

    <?php // echo $form->field($model, 'dec_heating_perk') ?>

    <?php // echo $form->field($model, 'dec_hotwater_perk_volume') ?>

    <?php // echo $form->field($model, 'dec_heating_perk_volume') ?>

    <?php // echo $form->field($model, 'hotwater_perk_date_of_filling') ?>

    <?php // echo $form->field($model, 'heating_perk_date_of_filling') ?>

    <?php // echo $form->field($model, 'hotwater_rate_date_of_filling') ?>

    <?php // echo $form->field($model, 'heating_rate_date_of_filling') ?>

    <?php // echo $form->field($model, 'date_of_last_payment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
