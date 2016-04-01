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
            'heating_rate_id',
            'hotwater_rate_id',
            'heating_invoice_id',
            'hotwater_invoice_id',
            'heating_perk_id',
            'hotwater_perk_id',
        ],
    ]) ?>

</div>
