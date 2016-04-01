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
            'heating_rate_id',
            'hotwater_rate_id',
            'heating_invoice_id',
            'hotwater_invoice_id',
            // 'heating_perk_id',
            // 'hotwater_perk_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
