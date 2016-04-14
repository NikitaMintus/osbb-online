<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 12.04.2016
 * Time: 21:46
 */

namespace console\controllers;
use common\models\User;
use Yii;
use yii\console\Controller;
use yii\web\Request;
use common\components\rbac\UserRoleRule;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->getAuthManager();
        $auth->removeAll();

        $user = $auth->createRole('user');
        $auth->add($user);

        $admin = $auth->createRole('admin');
        $auth->add($admin);

        $auth->addChild($admin, $user);

        $this->stdout('Done');
    }

    public function actionTest()
    {
        Yii::$app->set('request', new Request());

        $auth = Yii::$app->getAuthManager();

        $user = new User(['id' => 7, 'username' => 'User']);
        $admin = new User(['id' => 8, 'username' => 'Admin']);

        $auth->revokeAll($user->id);
        $auth->revokeAll($admin->id);

        $auth->assign($auth->getRole('user'), $user->id);
        $auth->assign($auth->getRole('admin'), $admin->id);


        Yii::$app->user->login($user);

        var_dump(Yii::$app->user->id);

        var_dump(Yii::$app->getAuthManager()->checkAccess($user->id, 'admin'));

        Yii::$app->user->login($admin);

        var_dump(Yii::$app->user->id);

        var_dump(Yii::$app->user->can('user'));

        echo PHP_EOL;
    }
}