<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\flat\PersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'People';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Person', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <? Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'person_id',
            'name',
            [
                'attribute' => 'surname',
                'value' => 'surname',
                'contentOptions'=>['style' => 'max-width: 400px'],
            ],
            'second_name',
            [
                'attribute' => 'birthday',
                'value' => 'birthday',
                'format' => 'raw',
                'contentOptions'=>['style' => 'width: 200px'],
                'filter' => DatePicker::widget([
                                'model' => $searchModel,
                                'attribute' => 'birthday',
                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' => 'yyyy-m-d'
                                    ],
                            ]),
            ],
            // 'id_code',
            // 'passport_id',
            // 'place_of_work',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <? Pjax::end(); ?>
</div>
