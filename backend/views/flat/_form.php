<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\flat\Person;


/* @var $this yii\web\View */
/* @var $model backend\models\flat\Flat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="flat-form">



    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'flat_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'owner_id')->textInput() ?>

<!--    --><?//= $form->field($owner, 'person_id')->textInput() ?>

    <?= $form->field($owner, 'person_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(Person::find()->all(), 'person_id', 'personFullName'),
        ['prompt' => 'Select person']
    ) ?>

    <?= $form->field($model, 'paybook_id')->textInput() ?>

    <?= $form->field($model, 'block')->textInput() ?>

    <?= $form->field($model, 'floor')->textInput() ?>

    <?= $form->field($model, 'size_of_flat')->textInput() ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
