<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use frontend\assets\FrontendAsset;

FrontendAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel backend\models\utilities\UtilitiesBookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
//$this->registerCssFile('@web/css/styleUtilities.css');
$this->title = 'Оплата коммунальных услуг';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utilities-book-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="row">
        <div class="col-md-10 col-sm-12 electric col-md-offset-1 col-sm-offset-0" >
<!--            <h2>Оплата электроэнергии</h2>-->
            <h1><?= Html::encode($this->title) ?></h1></br>
<!--            <form name="electric-form" action="index.html" method="post">-->
                <?php $form = ActiveForm::begin(); ?>

<!--                <label for="fio">ФИО</label>-->
<!--                <input type="text" name="fio" placeholder="ФИО">-->
                <?= $form->field($model, 'utlities_rate_id')->label('ФИО');   ?>

                <label for="adress">Адрес</label>
                <input type="text" name="adress" placeholder="Адрес">

                <table border="1" class="electric-receipt">
                    <thead>
                    <th colspan="8">Показатели счетчика</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Предыдущие</td>
                        <td colspan="5">
                            <input type="text" name="previous_value" placeholder="Предыдущие показатели">
                        </td>
                    </tr>
                    <tr>
                        <td>Текущие</td>
                        <td colspan="5">
                            <input type="text" name="current_value" placeholder="Текущие показатели">
                        </td>
                    </tr>
                    <tr>
                        <td>Разница</td>
                        <td colspan="5">
                            <input type="text" name="diff_value" value = "0" placeholder="Разница" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>Тарифы</td>
                        <td colspan="2">1 блок</td>
                        <td colspan="2">2 блок</td>
                        <td colspan="2">3 блок</td>
                    </tr>
                    <tr>
                        <td>кВт.час</td>
                        <td colspan="2">
                            <input type="text" name="block1_kvt" placeholder="кВт.час">
                        </td>
                        <td colspan="2">
                            <input type="text" name="block2_kvt" placeholder="кВт.час">
                        </td>
                        <td colspan="2">
                            <input type="text" name="block3_kvt" placeholder="кВт.час">
                        </td>
                    </tr>
                    <tr>
                        <td>грн</td>
                        <td colspan="2">
                            <input type="text" name="block1_price" placeholder="грн" disabled>
                        </td>
                        <td colspan="2">
                            <input type="text" name="block2_price" placeholder="грн" disabled>
                        </td>
                        <td colspan="2">
                            <input type="text" name="block3_price" placeholder="грн" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>скидка</td>
                        <td colspan="5">
                            <input type="text" name="sale" placeholder="грн">
                        </td>
                    </tr>
                    <tr>
                        <td>Всего, грн</td>
                        <td colspan="5">
                            <input type="text" name="total" placeholder="грн" disabled>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <p>
                    <?= Html::a('Оплатить', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?php ActiveForm::end(); ?>
<!--            </form>-->
        </div>
    </div>
</div>
