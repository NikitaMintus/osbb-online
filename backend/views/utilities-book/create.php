<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\utilities\UtilitiesBook */

$this->title = 'Create Utilities Book';
$this->params['breadcrumbs'][] = ['label' => 'Utilities Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utilities-book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
