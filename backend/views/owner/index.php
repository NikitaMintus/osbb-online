<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use backend\models\flat\Owner;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\flat\OwnerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Owners';
$this->params['breadcrumbs'][] = $this->title;

//$owner = Owner::find();

//$query = $person2;
//$query = $searchModel->getPersons();
//$query = Owner::find()->joinWith('person', true, 'INNER JOIN');
//$query = Owner::find()->joinWith('person', true, 'INNER JOIN');


//$dataProvider = new ActiveDataProvider([
//    //'query' => $query,
//]);

?>
<div class="owner-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Owner', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'personName',
            'personSurname',
//            [
//                'attribute' => 'person_id',
//                'value' => 'person.name',
//                'label' => 'Name',
//            ],
//            [
//                'attribute' => 'person_id',
//                'value' => 'person.surname',
//                'label' => 'Surname',
//            ],
//            [
//                'attribute' => 'person_id',
//                'value' => 'person.second_name',
//                'label' => 'Second name',
//            ],
//            [
//                'attribute' => 'person_id',
//                'value' => 'person.birthday',
//                'label' => 'Birthday',
//            ],
//            [
//                'attribute' => 'person_id',
//                'value' => 'person.id_code',
//                'label' => 'Id code',
//            ],
//            [
//                'attribute' => 'person_id',
//                'value' => 'person.place_of_work',
//                'label' => 'Place of work',
//            ],
//            'owner_id',
//            'person_id',
//            'person.name',
//            'person.surname',
//            'person.second_name',
//            'person.birthday',
//            'person.id_code',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
