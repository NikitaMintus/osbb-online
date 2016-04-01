<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\heating\HeatingBook */

$this->title = 'Update Heating Book: ' . $model->heating_book_id;
$this->params['breadcrumbs'][] = ['label' => 'Heating Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->heating_book_id, 'url' => ['view', 'id' => $model->heating_book_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="heating-book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
