<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\gas\GasBook */

$this->title = 'Update Gas Book: ' . $model->gas_book_id;
$this->params['breadcrumbs'][] = ['label' => 'Gas Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->gas_book_id, 'url' => ['view', 'id' => $model->gas_book_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gas-book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
