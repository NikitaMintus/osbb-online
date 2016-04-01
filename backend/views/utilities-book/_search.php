<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\utilities\UtilitiesBookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="utilities-book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'utilities_book_id') ?>

    <?= $form->field($model, 'utlities_rate_id') ?>

    <?= $form->field($model, 'utilities_invoice_id') ?>

    <?= $form->field($model, 'utilities_perk_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
