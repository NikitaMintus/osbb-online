<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\heating\HeatingBook */

$this->title = 'Create Heating Book';
$this->params['breadcrumbs'][] = ['label' => 'Heating Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="heating-book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
