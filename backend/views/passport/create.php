<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\flat\Passport */

$this->title = 'Create Passport';
$this->params['breadcrumbs'][] = ['label' => 'Passports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="passport-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
