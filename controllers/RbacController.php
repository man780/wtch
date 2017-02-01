<?php
/**
 * Created by JetBrains PhpStorm.
 * User: murod
 * Date: 7/19/15
 * Time: 2:28 AM
 * To change this template use File | Settings | File Templates.
 */
namespace console\controllers;
use Yii;
use yii\web\Controller;
use common\components\rbac\UserRoleRule;
use yii\rbac\PhpManager;
class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll(); //удаляем старые данные
        //Создадим для примера права для доступа к админке
        $dashboard = $auth->createPermission('dashboard');
        $dashboard->description = 'Админ панель';
        $auth->add($dashboard);
        //Включаем наш обработчик
        $rule = new UserRoleRule();
        $auth->add($rule);
        //Добавляем роли
        $user = $auth->createRole('user');
        $user->description = 'Пользователь';
        $user->ruleName = $rule->name;
        $auth->add($user);
        $moder = $auth->createRole('moder');
        $moder->description = 'Модератор';
        $moder->ruleName = $rule->name;
        $auth->add($moder);
        //Добавляем потомков
        $auth->addChild($moder, $user);
        $auth->addChild($moder, $dashboard);
        $admin = $auth->createRole('admin');
        $admin->description = 'Администратор';
        $admin->ruleName = $rule->name;
        $auth->add($admin);
        $auth->addChild($admin, $moder);
    }
}