<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ElectricityBook */

$this->title = 'Create Electricity Book';
$this->params['breadcrumbs'][] = ['label' => 'Electricity Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="electricity-book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
