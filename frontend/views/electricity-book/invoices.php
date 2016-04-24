<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use dosamigos\datepicker\DatePicker;
use frontend\assets\FrontendAsset;

FrontendAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel backend\models\utilities\UtilitiesBookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
//$this->registerCssFile('@web/css/styleUtilities.css');
$this->title = 'Квитанции за электроэнергию';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="electricity-book-invoices">


    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <h1>Квитанции за оплату электроэнергии</h1>

    <? Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
             'attribute' => 'date_of_filling',
             'value' => 'date_of_filling',
             'format' => 'raw',
                'headerOptions' => ['width' => '25%'],
//             'contentOptions'=>['style'=>'width: 25%;'],
             'label' => 'Дата',

             'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'language' => 'ru',
                    'attribute' => 'date_of_filling',
                    'id' => 'datePickerElectricityInvoices',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                    ],
                ]),
            ],
//            [
//             'attribute' => 'dec_counter_previous',
//             'label' => 'Предыдущие, кВт.час',
//            ],
//            [
//                'attribute' => 'dec_counter_current',
//                'label' => 'Текущие, кВт.час',
//            ],
            [
                'attribute' => 'dec_substraction',
                'label' => 'Разница, кВт.час',
            ],
            [
                'attribute' => 'dec_electricity_perk',
                'label' => 'Льгота, %',
            ],
            [
                'attribute' => 'dec_electricity_perk',
                'label' => 'Всего, грн',
            ],
            [
                'format' => 'raw',
                'value' => function($data){
                    return Html::a('Открыть', ['electricity-book/view', 'id' => $data['electricity_invoice_id']], [
                        'class'=>'btn btn-primary',
                        'target'=>'_blank',
                        'data-toggle'=>'tooltip',
//                        'title'=>'Просмотреть квитанцию в формате PDF'
                    ] );
                },
            ],

//    * @property string $dec_payment_block1
//    * @property string $dec_amount_block2
//    * @property string $dec_payment_block2
//    * @property string $dec_amount_block3
//    * @property string $dec_payment_block3
//    * @property string $dec_sum
//    * @property string $dec_electricity_perk
//    * @property string $date_of_filling
//    * @property string $dec_total



        ],
    ]); ?>
    <? Pjax::end(); ?>
</div>
