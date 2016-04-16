<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 16.04.2016
 * Time: 13:38
 */

namespace frontend\assets;

use yii\web\AssetBundle;


class FrontendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/styleUtilities.css',
    ];
    public $js = [

    ];
}