<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\water\WaterBook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="water-book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'water_rate_id')->textInput() ?>

    <?= $form->field($model, 'int_count_of_people')->textInput() ?>

    <?= $form->field($model, 'water_perk_id')->textInput() ?>

    <?= $form->field($model, 'water_invoice_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
