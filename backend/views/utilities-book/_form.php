<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\utilities\UtilitiesBook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="utilities-book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'utlities_rate_id')->textInput() ?>

    <?= $form->field($model, 'utilities_invoice_id')->textInput() ?>

    <?= $form->field($model, 'utilities_perk_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
