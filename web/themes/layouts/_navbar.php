<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Tatibaev
 * Date: 5/30/15
 * Time: 5:48 PM
 * To change this template use File | Settings | File Templates.
 */
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

    NavBar::begin([
        'brandLabel' => 'Школа брейка INSPIRE',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default navbar-custom navbar-fixed-top',
        ],
        'innerContainerOptions' => ['class'=>'container-fluid'], //The HTML attributes of the inner container.
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'О нас', 'url' => ['/site/about']],
            ['label' => 'Блог', 'url' => ['/blog']],
            ['label' => 'Контакты', 'url' => ['/site/contact']],
        ],
    ]);
    NavBar::end();
?>