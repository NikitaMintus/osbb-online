<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\water\WaterBook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="water-book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'int_water_private_code')->textInput() ?>

    <?= $form->field($model, 'dec_water_rate_delivery')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dec_water_rate_drainage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'water_rate_delivery_date_of_filling')->textInput() ?>

    <?= $form->field($model, 'water_rate_drainage_date_of_filling')->textInput() ?>

    <?= $form->field($model, 'dec_counter_previous_coldwater')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dec_counter_previous_hotwater')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_of_last_payment')->textInput() ?>

    <?= $form->field($model, 'dec_water_perk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dec_water_perk_volume')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'water_perk_date_of_filling')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
