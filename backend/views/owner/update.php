<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\flat\Owner */

$this->title = 'Update Owner: ' . $model->owner_id;
$this->params['breadcrumbs'][] = ['label' => 'Owners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->owner_id, 'url' => ['view', 'id' => $model->owner_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="owner-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
