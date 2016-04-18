<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\heating\HeatingBook */

$this->title = $model->heating_book_id;
$this->params['breadcrumbs'][] = ['label' => 'Heating Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="heating-book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->heating_book_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->heating_book_id], [
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
            'heating_book_id',
            'int_heating_private_code',
            'dec_hotwater_rate',
            'dec_heating_rate',
            'dec_hotwater_counter_previous',
            'dec_heating_counter_previous',
            'dec_hotwater_perk',
            'dec_heating_perk',
            'dec_hotwater_perk_volume',
            'dec_heating_perk_volume',
            'hotwater_perk_date_of_filling',
            'heating_perk_date_of_filling',
            'hotwater_rate_date_of_filling',
            'heating_rate_date_of_filling',
            'date_of_last_payment',
        ],
    ]) ?>

</div>
