<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 16.04.2016
 * Time: 15:56
 */

namespace frontend\controllers;


use backend\models\flat\Flat;
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
//        $userID = Yii::$app->user->getId();
//        $flat = Flat::findOne(Yii::$app->user->flat_id);
//        $newData = new ElectricityBook();
        $model = new ElectricityBook;

        if ($model->load(Yii::$app->request->post())) {
            $model->save();

//            return $this->redirect(['view', 'id' => $model->electricity_book_id]);
        } else {
            return $this->render('payment', [
                'model' => $model,
            ]);
        }
    }
}