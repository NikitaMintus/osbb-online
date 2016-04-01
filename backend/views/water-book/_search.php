<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\water\WaterBookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="water-book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'water_book_id') ?>

    <?= $form->field($model, 'water_rate_id') ?>

    <?= $form->field($model, 'int_count_of_people') ?>

    <?= $form->field($model, 'water_perk_id') ?>

    <?= $form->field($model, 'water_invoice_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
