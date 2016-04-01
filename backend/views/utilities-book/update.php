<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\utilities\UtilitiesBook */

$this->title = 'Update Utilities Book: ' . $model->utilities_book_id;
$this->params['breadcrumbs'][] = ['label' => 'Utilities Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->utilities_book_id, 'url' => ['view', 'id' => $model->utilities_book_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="utilities-book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
