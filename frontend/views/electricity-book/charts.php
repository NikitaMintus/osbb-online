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
use dosamigos\datepicker\DateRangePicker;
use dosamigos\selectize\SelectizeDropDownList;



$this->title = 'Диаграммы платежей за электроэнергию';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="electricity-book-charts">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">

        <?Pjax::begin(['id' =>'choose_type']);?>
        <? FrontendAsset::register($this); ?>
        <? $form = ActiveForm::begin(['options' => ['data-pjax' => true , 'id' => 'electricity-choose-type-form']]); ?>
        <div class="row electricity-choose-diagram">
            <div class="col-md-offset-1 col-md-3">
                <?= SelectizeDropDownList::widget([
                    'name' => 'selectType',
                    'items' => ['Линейная диаграмма', 'Столбчатая диаграмма'],
                    'id' => 'electricity-select-type-chart',
                    'value' => $type,
                    'clientOptions' => [
                    ],
                ]);
                ?>
            </div>

            <div class="col-md-5">
<!--                    --><?//= Html::dropDownList('selectType', $type, [0 => 'Линейная диаграмма', 1 => 'Столбчатая диаграмма', 2 => 'Круговая'], ['prompt' => 'Выберите тип диаграммы', 'id'=>'electricity-select-type-chart']); ?>
                    <?= DateRangePicker::widget([
                        'name' => 'dateFrom',
                        'value' => $dateFrom,
                        'nameTo' => 'dateTo',
                        'valueTo' => $dateTo,
                        'attributeTo' => 'до',
                        'language' => 'ru',
                        'clientOptions' => [
                            'id' => 'selectDateRange',
                            'format' => 'dd-mm-yyyy',
                        ]
                    ] );?>

            </div>
            <div class="col-md-1">
                <?= Html::submitButton('Построить', [ 'class' => 'btn btn-success', 'id' => 'electricity-submit-type-change', ]) ?>
            </div>

        </div>
        <? ActiveForm::end(); ?>


        <?  $types = ['0' => 'Line', '1' => 'Bar', '2' => 'Pie']; ?>
        <div class="row">
            <div class="col-md-5 col-md-offset-1 ">
                <h4>Цена, грн</h4>
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
                <h4>Количество, Квт. час</h4>

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
                                'data' => $amounts,
                            ]
                        ]
                    ]
                ]);
                ?>
             </div>
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
