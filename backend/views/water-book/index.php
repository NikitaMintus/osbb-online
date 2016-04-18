<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\water\WaterBookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Water Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="water-book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Water Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'water_book_id',
            'int_water_private_code',
            'dec_water_rate_delivery',
            'dec_water_rate_drainage',
            'water_rate_delivery_date_of_filling',
            // 'water_rate_drainage_date_of_filling',
            // 'dec_counter_previous_coldwater',
            // 'dec_counter_previous_hotwater',
            // 'date_of_last_payment',
            // 'dec_water_perk',
            // 'dec_water_perk_volume',
            // 'water_perk_date_of_filling',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
