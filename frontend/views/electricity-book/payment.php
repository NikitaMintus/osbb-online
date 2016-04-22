<?php
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

use frontend\assets\FrontendAsset;


FrontendAsset::register($this);




/* @var $this yii\web\View */
/* @var $searchModel backend\models\utilities\UtilitiesBookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
//$this->registerCssFile('@web/css/styleUtilities.css');
$this->title = 'Оплата электроэнергии';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="electricity-book-payment">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
        <div class="col-md-10 col-sm-12 electric col-md-offset-1 col-sm-offset-0" >

            <h1><?= Html::encode($this->title) ?></h1></br>

                <?php $form = ActiveForm::begin(['enableAjaxValidation' => true]); ?>

                <div>
                    <p><strong>ФИО:</strong> <?= $user->fio?></p>
                    <p><strong>Адрес:</strong> <?= $flat->adress?></p>
                </div>

                <table border="1" class="electric-receipt">
                    <thead>
                    <th colspan="8">Показатели счетчика</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="2">Предыдущие</td>
                        <td colspan="6">
                            <?= $form->field($electricityInvoice, 'dec_counter_previous', ['options' => ['id' => '#electricityinvoice_counter_previous']])->textInput(['maxlength' => 30, 'readonly'=>true, 'style'=>'width:200px;', 'value' => $electricityBook->dec_counter_previous])->label('')  ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Текущие</td>
                        <td colspan="6">
                            <?= $form->field($electricityInvoice, 'dec_counter_current')->textInput(['maxlength' => 30, 'style'=>'width:200px;'])->label('')->error(['id' => 'electricityinvoice_counter_current_error'])   ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Разница</td>
                        <td colspan="6">
                            <?= $form->field($electricityInvoice, 'dec_substraction')->textInput(['maxlength' => 30, 'style'=>'width:200px;', 'readonly' => true])->label('')  ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Тарифы</td>
                        <td colspan="2">1 блок</td>
                        <td colspan="2">2 блок</td>
                        <td colspan="2">3 блок</td>
                    </tr>
                    <tr>
                        <td colspan="2">Тариф, грн</td>
                        <td colspan="2">
                            <div class="electricity-rates" id="electricity-rates-block1"><?= $electricityBook->dec_rate_block1 ?></div>
                        </td>
                        <td colspan="2">
                            <div class="electricity-rates" id="electricity-rates-block2"><?= $electricityBook->dec_rate_block2 ?></div>
                        </td>
                        <td colspan="2">
                            <div class="electricity-rates" id="electricity-rates-block3"><?= $electricityBook->dec_rate_block3 ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">До, Квт.час</td>
                        <td colspan="2">
                            <div class="electricity-rates" id="electricity-rates-block1-limit"><?= $electricityBook->int_rate_block1_limit ?></div>
                        </td>
                        <td colspan="2">
                            <div class="electricity-rates" id="electricity-rates-block2-limit"><?= $electricityBook->int_rate_block2_limit ?></div>
                        </td>
                        <td colspan="2">
                            <div class="electricity-rates" id="electricity-rates-block3-limit"><?= $electricityBook->int_rate_block3_limit ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">кВт.час</td>
                        <td colspan="2">
                            <?= $form->field($electricityInvoice, 'dec_amount_block1')->textInput(['maxlength' => 30, 'style'=>'width:200px;', 'readonly' => true])->label('')  ?>
                        </td>
                        <td colspan="2">
                            <?= $form->field($electricityInvoice, 'dec_amount_block2')->textInput(['maxlength' => 30, 'style'=>'width:200px;', 'readonly' => true])->label('')  ?>
                        </td>
                        <td colspan="2">
                            <?= $form->field($electricityInvoice, 'dec_amount_block3')->textInput(['maxlength' => 30, 'style'=>'width:200px;', 'readonly' => true])->label('')  ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">грн</td>
                        <td colspan="2">
                            <?= $form->field($electricityInvoice, 'dec_payment_block1')->textInput(['maxlength' => 30, 'style'=>'width:200px;', 'readonly' => true])->label('')  ?>
                        </td>
                        <td colspan="2">
                            <?= $form->field($electricityInvoice, 'dec_payment_block2')->textInput(['maxlength' => 30, 'style'=>'width:200px;', 'readonly' => true])->label('')  ?>
                        </td>
                        <td colspan="2">
                            <?= $form->field($electricityInvoice, 'dec_payment_block3')->textInput(['maxlength' => 30, 'style'=>'width:200px;', 'readonly' => true])->label('')  ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Cумма, грн</td>
                        <td colspan="6">
                            <?= $form->field($electricityInvoice, 'dec_sum')->textInput(['readonly' => true, 'maxlength' => 30, 'style'=>'width:200px;'])->label('')   ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">скидка, %</td>
                        <td colspan="6">
                            <?= $form->field($electricityInvoice, 'dec_electricity_perk')->textInput(['maxlength' => 30, 'style'=>'width:200px;', 'readonly' => true, 'value' => $electricityBook->dec_electric_perk])->label('')  ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Всего, грн</td>
                        <td colspan="6">
                            <?= $form->field($electricityInvoice, 'dec_total')->textInput(['readonly' => true, 'maxlength' => 30, 'style'=>'width:200px;'])->label('')   ?>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="form-group">
                    <?= Html::submitButton($electricityInvoice->isNewRecord ? 'Оплатить' : 'Update', ['class' => $electricityInvoice->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>
        </div>
    </div>
    <?= Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> Privacy Statement', ['/electricity-book/pdf-invoice'], [
        'class'=>'btn btn-danger',
        'target'=>'_blank',
        'data-toggle'=>'tooltip',
        'title'=>'Will open the generated PDF file in a new window'
    ]); ?>
</div>

