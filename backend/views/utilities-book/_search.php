<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\utilities\UtilitiesBookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="utilities-book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'utilities_book_id') ?>

    <?= $form->field($model, 'int_utilities_personal_code') ?>

    <?= $form->field($model, 'dec_utlities_rate') ?>

    <?= $form->field($model, 'utilities_rate_date_of_filling') ?>

    <?= $form->field($model, 'dec_utilities_perk') ?>

    <?php // echo $form->field($model, 'utilities_perk_date_of_filling') ?>

    <?php // echo $form->field($model, 'dec_utilities_size_of_flat') ?>

    <?php // echo $form->field($model, 'utilities_date_of_last_payment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
