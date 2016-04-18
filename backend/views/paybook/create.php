<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\flat\Paybook */

$this->title = 'Create Paybook';
$this->params['breadcrumbs'][] = ['label' => 'Paybooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paybook-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
