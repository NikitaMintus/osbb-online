<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\flat\Passport */

$this->title = 'Update Passport: ' . $model->passport_id;
$this->params['breadcrumbs'][] = ['label' => 'Passports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->passport_id, 'url' => ['view', 'id' => $model->passport_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="passport-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
