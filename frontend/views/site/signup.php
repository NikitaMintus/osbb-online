<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста, заполните следующие поля для регистрации:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логин')?>

                <?= $form->field($model, 'email')->label('Email') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

                <?= $form->field($model, 'fio')->label('ФИО') ?>

                <?= $form->field($model, 'birthday')->label('Дата рождения') ?>

                <?= $form->field($model, 'id_code')->label('Идентификационный код') ?>

                <?= $form->field($model, 'passport')->label('Серия и номер пасспорта') ?>

                <?= $form->field($model, 'place_of_work')->label('Место работы') ?>

                <div class="form-group">
                    <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
