<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\flat\Passport */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="passport-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'series_number_of_passport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number_of_passport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'issued_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'issued_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
