<?php

/* @var $this yii\web\View */
use frontend\assets\FrontendAsset;
use yii\helpers\Html;
FrontendAsset::register($this);
$this->title = 'Главная';

Yii::$app->setHomeUrl('site/index');
?>



<div class="site-index">

    <div class="body-content">
<!--        <h1> Личный кабинет </h1>-->
        <div class="row">
            <div class="col-lg-4 site-item-block">
                <h2>Газ</h2>
                <a href="#"><img src="images/gas1.png" alt="Газ" width="200px" height="200px"></a>


<!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>-->
            </div>
            <div class="col-lg-4 site-item-block" >
                <h2>Электроэнергия</h2>
                <a href="electricity-book\invoices"></a>
                <?= Html::a('<img src="images/electricity5.png" alt="Газ" width="200px" height="200px">', ['/electricity-book/invoices']); ?>


<!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>-->
            </div>
            <div class="col-lg-4 site-item-block" >
                <h2>Вода</h2>
                <a href="#"><img src="images/water1.png" alt="Газ" width="200px" height="200px"></a>

<!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>-->
            </div>

            <div class="col-lg-4 site-item-block">
                <h2>Отопление</h2>
                <a href="#"><img src="images/heating2.png" alt="Газ" width="200px" height="200px"></a>

                <!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>-->
            </div>

            <div class="col-lg-4 site-item-block">
                <h2>Квартплата</h2>
                <a href="#"><img src="images/utilities3.png" alt="Газ" width="200px" height="200px"></a>

<!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>-->
            </div>



            <div class="col-lg-4 site-item-block">
                <h2>Настройки</h2>
                <a href="#"><img src="images/settings.svg" alt="Газ" width="200px" height="200px"></a>

<!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>-->
            </div>
        </div>

    </div>
</div>
