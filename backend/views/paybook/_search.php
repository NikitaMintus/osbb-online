<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PaybookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paybook-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'paybook_id') ?>

    <?= $form->field($model, 'utilities_book_id') ?>

    <?= $form->field($model, 'gas_book_id') ?>

    <?= $form->field($model, 'water_book_id') ?>

    <?= $form->field($model, 'heating_book_id') ?>

    <?php // echo $form->field($model, 'electric_book_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
