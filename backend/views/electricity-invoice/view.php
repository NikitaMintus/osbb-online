<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\electricity\ElectricityInvoice */

$this->title = $model->electricity_invoice_id;
$this->params['breadcrumbs'][] = ['label' => 'Electricity Invoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="electricity-invoice-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->electricity_invoice_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->electricity_invoice_id], [
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
            'electricity_invoice_id',
            'dec_counter_current',
            'dec_counter_previous',
            'dec_substraction',
            'electricity_catalog_rates_invoice_id',
            'dec_sum',
            'electricity_perk_id',
            'dec_fine',
            'date_of_filling',
            'dec_total',
        ],
    ]) ?>

</div>
