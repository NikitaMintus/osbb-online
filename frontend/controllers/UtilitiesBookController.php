<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 16.04.2016
 * Time: 12:42
 */

namespace frontend\controllers;

use backend\models\utilities\UtilitiesBook;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use Yii;

class UtilitiesBookController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => UtilitiesBook::find()->with('utilitiesInvoice'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionInvoices()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => UtilitiesBook::find()->with('utilitiesInvoice'),
        ]);

        return $this->render('invoices', [
            'dataProvider' => $dataProvider,
        ]);
    }

//    public function actionPayment()
//    {
//        $dataProvider = new ActiveDataProvider([
//            'query' => UtilitiesBook::find()->with('utilitiesInvoice'),
//        ]);
//
//        return $this->render('payment', [
//            'dataProvider' => $dataProvider,
//        ]);
//    }

    public function actionPayment()
    {
        $model = new UtilitiesBook();

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