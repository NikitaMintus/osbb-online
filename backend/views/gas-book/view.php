<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\gas\GasBook */

$this->title = $model->gas_book_id;
$this->params['breadcrumbs'][] = ['label' => 'Gas Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gas-book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->gas_book_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->gas_book_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'gas_book_id',
            'gas_rate_id',
            'gas_perk_id',
            'gas_invoice_id',
        ],
    ]) ?>

</div>
