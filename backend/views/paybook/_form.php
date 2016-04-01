<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Paybook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paybook-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'utilities_book_id')->textInput() ?>

    <?= $form->field($model, 'gas_book_id')->textInput() ?>

    <?= $form->field($model, 'water_book_id')->textInput() ?>

    <?= $form->field($model, 'heating_book_id')->textInput() ?>

    <?= $form->field($model, 'electric_book_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
