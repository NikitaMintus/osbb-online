<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\gas\GasBook */

$this->title = 'Create Gas Book';
$this->params['breadcrumbs'][] = ['label' => 'Gas Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gas-book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
