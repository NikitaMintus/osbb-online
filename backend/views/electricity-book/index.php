<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ElectricityBookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Electricity Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="electricity-book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Electricity Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'electricity_book_id',
            'int_number_of_contract',
            'electricity_rate_id',
            'electricity_perk_id',
            'electricity_invoice_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
