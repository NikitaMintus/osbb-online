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
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'utilities_book_id',
            'int_utilities_personal_code',
            'dec_utlities_rate',
            'utilities_rate_date_of_filling',
            'dec_utilities_perk',
            // 'utilities_perk_date_of_filling',
            // 'dec_utilities_size_of_flat',
            // 'utilities_date_of_last_payment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
