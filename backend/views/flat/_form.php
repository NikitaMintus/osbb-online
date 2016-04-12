<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\flat\Flat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="flat-form">



    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'flat_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'paybook_id')->textInput() ?>

<!--    --><?//= $form->field($model->owner, 'person_id')->dropDownList(\yii\helpers\ArrayHelper::map(\backend\models\flat\Person::find()->all(), 'person_id', 'surname' ))?>

    <?= $form->field($model, 'owner_id')->dropDownList(\yii\helpers\ArrayHelper::map(\backend\models\flat\Owner::find()->all(), 'owner_id', 'person.name' ))?>

    <?= $form->field($model, 'block')->textInput() ?>

    <?= $form->field($model, 'floor')->textInput() ?>

    <?= $form->field($model, 'size_of_flat')->textInput() ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
