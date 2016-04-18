<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\gas\GasBookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gas Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gas-book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Gas Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'gas_book_id',
            'int_gas_personal_code',
            'dec_gas_rate',
            'gas_rate_date_of_filling',
            'dec_gas_perk',
            // 'dec_perk_gas_volume',
            // 'dec_counter_previous',
            // 'date_of_last_payment',
            // 'gas_perk_date_of_filling',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
