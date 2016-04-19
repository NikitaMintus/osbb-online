<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\electricity\ElectricityBookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="electricity-book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'electricity_book_id') ?>

    <?= $form->field($model, 'int_number_of_personal_code') ?>

    <?= $form->field($model, 'dec_rate_block1') ?>

    <?= $form->field($model, 'int_rate_block1_limit') ?>

    <?= $form->field($model, 'dec_rate_block2') ?>

    <?php // echo $form->field($model, 'int_rate_block2_limit') ?>

    <?php // echo $form->field($model, 'dec_rate_block3') ?>

    <?php // echo $form->field($model, 'int_rate_block3_limit') ?>

    <?php // echo $form->field($model, 'dec_electric_perk') ?>

    <?php // echo $form->field($model, 'dec_electric_perk_limit') ?>

    <?php // echo $form->field($model, 'electric_rate_date_of_filling') ?>

    <?php // echo $form->field($model, 'electric_perk_date_of_filling') ?>

    <?php // echo $form->field($model, 'electric_date_of_last_payment') ?>

    <?php // echo $form->field($model, 'dec_counter_previous') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
