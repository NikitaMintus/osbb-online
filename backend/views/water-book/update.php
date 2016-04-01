<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\water\WaterBook */

$this->title = 'Update Water Book: ' . $model->water_book_id;
$this->params['breadcrumbs'][] = ['label' => 'Water Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->water_book_id, 'url' => ['view', 'id' => $model->water_book_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="water-book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
