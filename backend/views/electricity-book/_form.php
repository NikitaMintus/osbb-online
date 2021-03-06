<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\electricity\ElectricityBook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="electricity-book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'int_number_of_contract')->textInput() ?>

    <?= $form->field($model, 'electricity_rate_id')->textInput() ?>

    <?= $form->field($model, 'electricity_perk_id')->textInput() ?>

    <?= $form->field($model, 'electricity_invoice_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
