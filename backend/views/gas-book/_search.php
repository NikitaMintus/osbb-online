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

    <?= $form->field($model, 'gas_rate_id') ?>

    <?= $form->field($model, 'gas_perk_id') ?>

    <?= $form->field($model, 'gas_invoice_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
