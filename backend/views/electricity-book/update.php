<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\electricity\ElectricityBook */

$this->title = 'Update Electricity Book: ' . $model->electricity_book_id;
$this->params['breadcrumbs'][] = ['label' => 'Electricity Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->electricity_book_id, 'url' => ['view', 'id' => $model->electricity_book_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="electricity-book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
