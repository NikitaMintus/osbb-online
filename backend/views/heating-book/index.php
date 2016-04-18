<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\heating\HeatingBookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Heating Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="heating-book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Heating Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'heating_book_id',
            'int_heating_private_code',
            'dec_hotwater_rate',
            'dec_heating_rate',
            'dec_hotwater_counter_previous',
            // 'dec_heating_counter_previous',
            // 'dec_hotwater_perk',
            // 'dec_heating_perk',
            // 'dec_hotwater_perk_volume',
            // 'dec_heating_perk_volume',
            // 'hotwater_perk_date_of_filling',
            // 'heating_perk_date_of_filling',
            // 'hotwater_rate_date_of_filling',
            // 'heating_rate_date_of_filling',
            // 'date_of_last_payment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
