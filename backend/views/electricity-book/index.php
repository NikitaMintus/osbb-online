<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\electricity\ElectricityBookSearch */
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
            'int_number_of_personal_code',
            'dec_rate_block1',
            'int_rate_block1_limit',
            'dec_rate_block2',
            // 'int_rate_block2_limit',
            // 'dec_rate_block3',
            // 'int_rate_block3_limit',
            // 'dec_electric_perk',
            // 'dec_electric_perk_limit',
            // 'electric_rate_date_of_filling',
            // 'electric_perk_date_of_filling',
            // 'electric_date_of_last_payment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
