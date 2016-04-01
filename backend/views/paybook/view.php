<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Paybook */

$this->title = $model->paybook_id;
$this->params['breadcrumbs'][] = ['label' => 'Paybooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paybook-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->paybook_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->paybook_id], [
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
            'paybook_id',
            'utilities_book_id',
            'gas_book_id',
            'water_book_id',
            'heating_book_id',
            'electric_book_id',
        ],
    ]) ?>

</div>
