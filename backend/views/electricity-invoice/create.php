<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\electricity\ElectricityInvoice */

$this->title = 'Create Electricity Invoice';
$this->params['breadcrumbs'][] = ['label' => 'Electricity Invoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="electricity-invoice-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
