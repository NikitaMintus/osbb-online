<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\utilities\UtilitiesBook */

$this->title = $model->utilities_book_id;
$this->params['breadcrumbs'][] = ['label' => 'Utilities Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utilities-book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->utilities_book_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->utilities_book_id], [
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
            'utilities_book_id',
            'int_utilities_personal_code',
            'dec_utlities_rate',
            'utilities_rate_date_of_filling',
            'dec_utilities_perk',
            'utilities_perk_date_of_filling',
            'dec_utilities_size_of_flat',
            'utilities_date_of_last_payment',
        ],
    ]) ?>

</div>
