<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\utilities\UtilitiesBook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="utilities-book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'int_utilities_personal_code')->textInput() ?>

    <?= $form->field($model, 'dec_utlities_rate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'utilities_rate_date_of_filling')->textInput() ?>

    <?= $form->field($model, 'dec_utilities_perk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'utilities_perk_date_of_filling')->textInput() ?>

    <?= $form->field($model, 'dec_utilities_size_of_flat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'utilities_date_of_last_payment')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
