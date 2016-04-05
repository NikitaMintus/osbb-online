<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\flat\FlatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Flats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Flat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'flat_id',
            'paybook_id',
            'owner_id',
            'block',
            'floor',
             'size_of_flat',
             'adress',
            [
//                'class' => 'yii\helpers\Html',
                'label' => 'Ссылка',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a('Paybook', Url::to(['paybook/view', 'id' => $data['paybook_id']]), ['class'=>'btn btn-primary'] );
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


    <?= Html::a('Paybook', ['/paybook/index'], ['class'=>'btn btn-primary']) ?>
</div>
