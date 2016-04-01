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

    <?= $form->field($model, 'heating_rate_id')->textInput() ?>

    <?= $form->field($model, 'hotwater_rate_id')->textInput() ?>

    <?= $form->field($model, 'heating_invoice_id')->textInput() ?>

    <?= $form->field($model, 'hotwater_invoice_id')->textInput() ?>

    <?= $form->field($model, 'heating_perk_id')->textInput() ?>

    <?= $form->field($model, 'hotwater_perk_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
