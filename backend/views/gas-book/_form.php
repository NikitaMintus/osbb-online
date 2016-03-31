<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\gas\GasBook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gas-book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'gas_rate_id')->textInput() ?>

    <?= $form->field($model, 'gas_perk_id')->textInput() ?>

    <?= $form->field($model, 'gas_invoice_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
