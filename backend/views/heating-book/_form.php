<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\heating\HeatingBook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="heating-book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'heating_book_id')->textInput() ?>

    <?= $form->field($model, 'int_heating_private_code')->textInput() ?>

    <?= $form->field($model, 'dec_hotwater_rate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dec_heating_rate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dec_hotwater_counter_previous')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dec_heating_counter_previous')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dec_hotwater_perk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dec_heating_perk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dec_hotwater_perk_volume')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dec_heating_perk_volume')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hotwater_perk_date_of_filling')->textInput() ?>

    <?= $form->field($model, 'heating_perk_date_of_filling')->textInput() ?>

    <?= $form->field($model, 'hotwater_rate_date_of_filling')->textInput() ?>

    <?= $form->field($model, 'heating_rate_date_of_filling')->textInput() ?>

    <?= $form->field($model, 'date_of_last_payment')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
