<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Tatibaev
 * Date: 6/2/15
 * Time: 4:34 PM
 * To change this template use File | Settings | File Templates.
 */
namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'themes/inspire/css/clean-blog.css',
        'http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css',
        'http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic',
        'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800',
    ];

    public $depends = [
        'app\assets\AppAsset',
    ];

    public $cssOptions = [
        'type' => 'text/css'
    ];
}
