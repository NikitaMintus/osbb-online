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
            'water_rate_id',
            'int_count_of_people',
            'water_perk_id',
            'water_invoice_id',
        ],
    ]) ?>

</div>
