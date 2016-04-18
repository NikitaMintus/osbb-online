<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\electricity\ElectricityBook */

$this->title = $model->electricity_book_id;
$this->params['breadcrumbs'][] = ['label' => 'Electricity Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="electricity-book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->electricity_book_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->electricity_book_id], [
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
            'electricity_book_id',
            'int_number_of_personal_code',
            'dec_rate_block1',
            'int_rate_block1_limit',
            'dec_rate_block2',
            'int_rate_block2_limit',
            'dec_rate_block3',
            'int_rate_block3_limit',
            'dec_electric_perk',
            'dec_electric_perk_limit',
            'electric_rate_date_of_filling',
            'electric_perk_date_of_filling',
            'electric_date_of_last_payment',
        ],
    ]) ?>

</div>
