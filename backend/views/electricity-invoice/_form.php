<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\electricity\ElectricityInvoice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="electricity-invoice-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dec_counter_current')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dec_counter_previous')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dec_substraction')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'electricity_catalog_rates_invoice_id')->textInput() ?>

    <?= $form->field($model, 'dec_sum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'electricity_perk_id')->textInput() ?>

    <?= $form->field($model, 'dec_fine')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_of_filling')->textInput() ?>

    <?= $form->field($model, 'dec_total')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
