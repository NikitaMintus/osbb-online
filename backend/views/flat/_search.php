<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\flat\FlatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="flat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'flat_id') ?>

    <?= $form->field($model, 'paybook_id') ?>

    <?= $form->field($model, 'block') ?>

    <?= $form->field($model, 'floor') ?>

    <?= $form->field($model, 'size_of_flat') ?>

    <?php // echo $form->field($model, 'adress') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
