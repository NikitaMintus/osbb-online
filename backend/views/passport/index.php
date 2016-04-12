<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PassportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Passports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="passport-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Passport', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'passport_id',
            'series_number_of_passport',
            'number_of_passport',
            'issued_by',
            'issued_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
