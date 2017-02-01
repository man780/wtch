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
        'brandLabel' => 'This project',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default navbar-custom navbar-fixed-top',
        ],
        'innerContainerOptions' => ['class'=>'container-fluid'], //The HTML attributes of the inner container.
    ]);
    $navItems=[
        //['label' => 'Главная', 'url' => ['/site/index']],
        ['label' => 'Найти блюда по ингридентам', 'url' => ['/site/find']],
        ['label' => 'Блюда', 'url' => ['/dishes/index']],
        ['label' => 'Ингредиенты', 'url' => ['/ingredients/index']],

    ];
    /*if (Yii::$app->user->isGuest) {
        $navItems[] = ['label' => 'Signup', 'url' => ['/user/register']];
        $navItems[] = ['label' => 'Login', 'url' => ['/user/login']];
    } else {
        $navItems[] = ['label' => 'Профиль', 'url' => ['/user/settings/profile']];
        $navItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/user/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }*/
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $navItems,
    ]);
    /*echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [

            //['label' => 'Контакты', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']],
        ],
    ]);*/
    NavBar::end();
?>