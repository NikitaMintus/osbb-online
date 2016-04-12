<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PassportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="passport-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'passport_id') ?>

    <?= $form->field($model, 'series_number_of_passport') ?>

    <?= $form->field($model, 'number_of_passport') ?>

    <?= $form->field($model, 'issued_by') ?>

    <?= $form->field($model, 'issued_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
