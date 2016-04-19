<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 16.04.2016
 * Time: 13:38
 */

namespace frontend\assets;


use yii\web\AssetBundle;
use yii\web\View;


class FrontendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/styleUtilities.css',
        'css/styleElectricity.css',
    ];
    public $js = [
        'assets/1893dda2/jquery.js',
        'js/electricityPayment.js',

    ];
    public $jsOptions = [
        'position' => View::POS_BEGIN,
    ];
}