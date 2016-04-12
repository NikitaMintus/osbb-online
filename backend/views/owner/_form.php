<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\flat\Person;

/* @var $this yii\web\View */
/* @var $model backend\models\flat\Owner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="owner-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'person_id')->textInput() ?>

    <?= $form->field($model, 'person_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(Person::find()->all(), 'person_id', 'personFullName'),
        ['prompt' => 'Select person']
    ) ?>

    <?= $form->field($model, 'personBirthday') ?>

    <?= $form->field($model, 'personPlaceOfWork')->label('Surname') ?>

    <?= $form->field($model, 'personIdCode')->label('Surname') ?>

    <?= $form->field($model, 'personPassportData')?>

    <?= $form->field($model, 'personPassportIssuedBy')?>

    <?= $form->field($model, 'personPassportIssuedDate')?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
