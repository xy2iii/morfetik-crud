<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author John Martin <john.itvn@gmail.com>
 * @since 1.0
 */
class CrudAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    //    public $publishOptions = [
    //        'forceCopy' => true,
    //    ];

    public $css = [
        'css/ajaxcrud.css'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'kartik\grid\GridViewAsset',
    ];

    public function init()
    {
        // In dev mode use non-minified javascripts
        $this->js = YII_DEBUG ? [
            'js/crud/ModalRemote.js',
            'js/crud/ajaxcrud.js',
        ] : [
            'js/crud/ModalRemote.min.js',
            'js/crud/ajaxcrud.min.js',
        ];

        parent::init();
    }
}
