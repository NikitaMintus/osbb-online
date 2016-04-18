<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\gas\GasBook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gas-book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'int_gas_personal_code')->textInput() ?>

    <?= $form->field($model, 'dec_gas_rate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gas_rate_date_of_filling')->textInput() ?>

    <?= $form->field($model, 'dec_gas_perk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dec_perk_gas_volume')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dec_counter_previous')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_of_last_payment')->textInput() ?>

    <?= $form->field($model, 'gas_perk_date_of_filling')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
