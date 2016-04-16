<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\utilities\UtilitiesBookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Utilities Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utilities-book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Utilities Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <? $models = $dataProvider2->getModels(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'utilities_book_id',
            'utlities_rate_id',
            'utilities_invoice_id',
            'utilities_perk_id',
            'utilitiesInvoice.dec_total',
            'utilitiesInvoice.utilities_rate_id',
            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>

    <?= Html::a('', ['create'], ['class' => 'btn btn-success'])?>

</div>
