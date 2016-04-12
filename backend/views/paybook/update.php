<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\flat\Paybook */

$this->title = 'Update Paybook: ' . $model->paybook_id;
$this->params['breadcrumbs'][] = ['label' => 'Flat', 'url' => ['flat/index']];
$this->params['breadcrumbs'][] = ['label' => 'Paybooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->paybook_id, 'url' => ['view', 'id' => $model->paybook_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paybook-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
