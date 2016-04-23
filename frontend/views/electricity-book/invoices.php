<?php
use yii\helpers\Html;
use yii\grid\GridView;



/* @var $this yii\web\View */
/* @var $searchModel backend\models\utilities\UtilitiesBookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
//$this->registerCssFile('@web/css/styleUtilities.css');
$this->title = 'Оплата коммунальных услуг';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="electricity-book-invoices">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'electric_book_id',
             'electricity_invoice_id',
             'electric_book_id',
             'adress',
              'dec_counter_current',
            'dec_counter_previous',
            'dec_substraction',
//    * @property string $dec_payment_block1
//    * @property string $dec_amount_block2
//    * @property string $dec_payment_block2
//    * @property string $dec_amount_block3
//    * @property string $dec_payment_block3
//    * @property string $dec_sum
//    * @property string $dec_electricity_perk
//    * @property string $date_of_filling
//    * @property string $dec_total


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
