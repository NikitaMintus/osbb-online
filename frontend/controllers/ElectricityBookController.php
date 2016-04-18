<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 16.04.2016
 * Time: 15:56
 */

namespace frontend\controllers;


use backend\models\flat\Flat;
use common\models\User;
use yii\web\Controller;
use Yii;
use yii\data\ActiveDataProvider;
use backend\models\electricity\ElectricityBook;

class ElectricityBookController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ElectricityBook::find()->with('utilitiesInvoice'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionInvoices()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ElectricityBook::find()->with('utilitiesInvoice'),
        ]);

        return $this->render('invoices', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPayment()
    {
        $userID = Yii::$app->user->getId();
        $user = User::findOne($userID);

        $newData = new ElectricityBook();
        $model = ElectricityBook::findOne($userID);

        if ($newData->load(Yii::$app->request->post())) {
            $newData->save();

//            return $this->redirect(['view', 'id' => $model->electricity_book_id]);
        } else {
            return $this->render('payment', [
                'model' => $model,
                'newData' => $newData,
                'user' => $user,
            ]);
        }
    }
}