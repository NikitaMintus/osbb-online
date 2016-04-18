<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\electricity\ElectricityBook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="electricity-book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'int_number_of_personal_code')->textInput() ?>

    <?= $form->field($model, 'dec_rate_block1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'int_rate_block1_limit')->textInput() ?>

    <?= $form->field($model, 'dec_rate_block2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'int_rate_block2_limit')->textInput() ?>

    <?= $form->field($model, 'dec_rate_block3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'int_rate_block3_limit')->textInput() ?>

    <?= $form->field($model, 'dec_electric_perk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dec_electric_perk_limit')->textInput() ?>

    <?= $form->field($model, 'electric_rate_date_of_filling')->textInput() ?>

    <?= $form->field($model, 'electric_perk_date_of_filling')->textInput() ?>

    <?= $form->field($model, 'electric_date_of_last_payment')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
