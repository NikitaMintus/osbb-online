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

    <?= $form->field($model, 'person_id')->textInput() ?>

    <?= $form->field($model, 'personName')->label('fddf') ?>

    <?= $form->field($model, 'person_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(Person::find()->all(), 'person_id','name'),
        ['prompt' => 'Select person']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
