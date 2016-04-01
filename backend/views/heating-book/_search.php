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

    <?= $form->field($model, 'heating_rate_id') ?>

    <?= $form->field($model, 'hotwater_rate_id') ?>

    <?= $form->field($model, 'heating_invoice_id') ?>

    <?= $form->field($model, 'hotwater_invoice_id') ?>

    <?php // echo $form->field($model, 'heating_perk_id') ?>

    <?php // echo $form->field($model, 'hotwater_perk_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
