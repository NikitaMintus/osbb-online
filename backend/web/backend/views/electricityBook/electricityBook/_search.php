<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ElectricityBookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="electricity-book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'electricity_book_id') ?>

    <?= $form->field($model, 'int_number_of_contract') ?>

    <?= $form->field($model, 'electricity_rate_id') ?>

    <?= $form->field($model, 'electricity_perk_id') ?>

    <?= $form->field($model, 'electricity_invoice_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
