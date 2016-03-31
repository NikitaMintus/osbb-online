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
            'gas_rate_id',
            'gas_perk_id',
            'gas_invoice_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
