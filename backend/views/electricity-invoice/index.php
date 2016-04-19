<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\electricity\ElectricityInvoiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Electricity Invoices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="electricity-invoice-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Electricity Invoice', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'electricity_invoice_id',
            'electric_book_id',
            'adress',
            'dec_counter_current',
            'dec_counter_previous',
            // 'dec_substraction',
            // 'dec_amount_block1',
            // 'dec_payment_block1',
            // 'dec_amount_block2',
            // 'dec_payment_block2',
            // 'dec_amount_block3',
            // 'dec_payment_block3',
            // 'dec_sum',
            // 'dec_electricity_perk',
            // 'date_of_filling',
            // 'dec_total',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
