<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 19.04.2016
 * Time: 21:44
 */
use yii\helpers\Html;
use dosamigos\chartjs\ChartJs;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use frontend\assets\FrontendAsset;



$this->title = 'Диаграммы платежей за электроэнергию';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="electricity-book-charts">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">

        <?Pjax::begin(['id' =>'choose_type']);?>
        <? FrontendAsset::register($this); ?>
        <div class="row electricity-choose-diagram">
            <div class="col-md-offset-8">
                <? $form = ActiveForm::begin(['options' => ['data-pjax' => true , 'id' => 'electricity-choose-type-form']]); ?>
                    <?= Html::dropDownList('selectType', $type, [0 => 'Линейная диаграмма', 1 => 'Столбчатая диаграмма', 2 => 'Круговая'], ['prompt' => 'Выберите тип диаграммы', 'id'=>'electricity-select-type-chart']); ?>
                    <?= Html::submitButton('Оплатить', [ 'class' => 'hidden', 'id' => 'electricity-submit-type-change', ]) ?>
                 <? ActiveForm::end(); ?>
                </div>
        </div>

    <?  $types = ['0' => 'Line', '1' => 'Bar', '2' => 'Pie']; ?>
    <div class="row">
        <div class="col-md-5 col-md-offset-1 ">
    <?= ChartJs::widget([
        'type' => $types[$type],
        'options' => [
            'height' => 400,
            'width' => 400,
        ],
        'data' => [
            'labels' => $dates,
            'datasets' => [
                [
                    'label' => "My First dataset",
                    'fillColor' => "rgba(220,220,220,0.5)",
                    'strokeColor' => "rgba(220,220,220,0.8)",
                    'highlightFill' => "rgba(220,220,220,0.75)",
                    'highlightStroke' => "rgba(220,220,220,1)",
                    'data' => $payments,
                ]
            ]
        ]
    ]);
    ?>
        </div>
        <div class="col-md-5">

    <?= ChartJs::widget([
        'type' => $types[$type],
        'options' => [
            'height' => 400,
            'width' => 400,
        ],
        'data' => [
            'labels' => $dates,
            'datasets' => [
                [
                    'label' => "My First dataset",
                    'fillColor' => "rgba(220,220,220,0.5)",
                    'strokeColor' => "rgba(220,220,220,0.8)",
                    'highlightFill' => "rgba(220,220,220,0.75)",
                    'highlightStroke' => "rgba(220,220,220,1)",
                    'data' => $payments,
                ]
            ]
        ]
    ]);
    ?>
    </div>

    </div>
        </div>

    <?php
    $script = <<< JS

$('#electricity-select-type-chart').change(function(){
    $('#electricity-choose-type-form').submit();
});

JS;
    $this->registerJs($script);
    ?>





        <?Pjax::end();?>



</div>
