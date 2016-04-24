<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 21.04.2016
 * Time: 22:24
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Оплата электроэнергии';
?>

<div class="electricity-book-payment">

    <div class="row">
        <div class="col-md-10 col-sm-12 electric col-md-offset-1 col-sm-offset-0" >

            <div>
                <h1><?= Html::encode($this->title) ?></h1>
                <p><strong>ФИО:</strong> <?= $user->fio?></p>
                <p><strong>Адрес:</strong> <?= $flat->adress?></p>
                <p><strong>Личный счет:</strong> <?= $electricityBook->int_number_of_personal_code?></p>
                <p><strong>Дата:</strong> <?= $electricityInvoice->date_of_filling?></p>
            </div>

            <table border="1" class="electric-receipt">
                <thead>
                <th colspan="8">Показатели счетчика</th>
                </thead>
                <tbody>
                <tr>
                    <td colspan="2">Предыдущие</td>
                    <td colspan="6">
                        <?= $electricityInvoice->dec_counter_previous; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Текущие</td>
                    <td colspan="6">
                        <?= $electricityInvoice->dec_counter_current; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Разница</td>
                    <td colspan="6">
                        <?= $electricityInvoice->dec_substraction; ?>
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
                        <?= $electricityInvoice->dec_amount_block1;  ?>
                    </td>
                    <td colspan="2">
                        <?= $electricityInvoice->dec_amount_block2; ?>
                    </td>
                    <td colspan="2">
                        <?= $electricityInvoice->dec_amount_block3; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">грн</td>
                    <td colspan="2">
                        <?= $electricityInvoice->dec_payment_block1 ?>
                    </td>
                    <td colspan="2">
                        <?= $electricityInvoice->dec_payment_block2 ?>
                    </td>
                    <td colspan="2">
                        <?= $electricityInvoice->dec_payment_block3 ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Cумма, грн</td>
                    <td colspan="6">
                        <?= $electricityInvoice->dec_sum; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">скидка, %</td>
                    <td colspan="6">
                        <?= $electricityInvoice->dec_electricity_perk;  ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Всего, грн</td>
                    <td colspan="6">
                        <?= $electricityInvoice->dec_total;   ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

