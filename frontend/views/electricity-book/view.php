<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\electricity\ElectricityInvoice */

$this->title = 'Квитанция за электроэнергию' ;
$this->params['breadcrumbs'][] = ['label' => 'Квитанции за электроэенергию', 'url' => ['electricity-book/invoices']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="electricity-invoice-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'adress',
            'dec_counter_current',
            'dec_counter_previous',
            'dec_substraction',
            'dec_amount_block1',
            'dec_payment_block1',
            'dec_amount_block2',
            'dec_payment_block2',
            'dec_amount_block3',
            'dec_payment_block3',
            'dec_sum',
            'dec_electricity_perk',
            'date_of_filling',
            'dec_total',
        ],
    ]) ?>
    <?= Html::a('Открыть PDF', ['electricity-book/pdf-invoice', 'id' => $model->electricity_invoice_id], [
        'class'=>'btn btn-primary',
        'target'=>'_blank',
        'data-toggle'=>'tooltip',
        'title'=>'Просмотреть квитанцию в формате PDF',
        'style' => 'margin-right:10px;'
    ] ); ?>
    <?= Html::a('Отправить на Email', ['electricity-book/send-pdf-invoice', 'id' => $model->electricity_invoice_id], [
        'class'=>'btn btn-primary',
        'data-toggle'=>'tooltip',
        'title'=>'Отправить квитанцию на email в формате PDF',
    ] ); ?>



</div>
