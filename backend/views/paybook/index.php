<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\flat\PaybookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paybooks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paybook-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Paybook', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'paybook_id',
            'utilities_book_id',
            'gas_book_id',
            'water_book_id',
            'heating_book_id',
            // 'electric_book_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
