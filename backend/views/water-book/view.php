<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\water\WaterBook */

$this->title = $model->water_book_id;
$this->params['breadcrumbs'][] = ['label' => 'Water Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="water-book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->water_book_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->water_book_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'water_book_id',
            'int_water_private_code',
            'dec_water_rate_delivery',
            'dec_water_rate_drainage',
            'water_rate_delivery_date_of_filling',
            'water_rate_drainage_date_of_filling',
            'dec_counter_previous_coldwater',
            'dec_counter_previous_hotwater',
            'date_of_last_payment',
            'dec_water_perk',
            'dec_water_perk_volume',
            'water_perk_date_of_filling',
        ],
    ]) ?>

</div>
