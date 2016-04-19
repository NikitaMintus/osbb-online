<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 16.04.2016
 * Time: 15:56
 */

namespace frontend\controllers;


use backend\models\electricity\ElectricityInvoice;
use backend\models\flat\Flat;
use backend\models\flat\Paybook;
use common\models\User;
use yii\web\Controller;
use Yii;
use yii\data\ActiveDataProvider;
use backend\models\electricity\ElectricityBook;
use yii\widgets\ActiveForm;

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
        $flat = Flat::findOne(['user_id'=> $userID]);
        $electricityBook = $flat->paybook->electricBook;
        $electricityInvoice = new ElectricityInvoice();


        if(Yii::$app->request->isAjax && $electricityInvoice->load($_POST))
        {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($electricityInvoice);
        }


        if ($electricityInvoice->load(Yii::$app->request->post()) ) {
            $electricityInvoice->electric_book_id = 1;
            $electricityInvoice->adress = $flat->adress;
//            $electricityInvoice->dec_counter_current = 43;
//            $electricityInvoice->dec_counter_previous = 43;
//            $electricityInvoice->dec_substraction = 43;
//            $electricityInvoice->dec_amount_block3 = 43;
//            $electricityInvoice->dec_amount_block2 = 43;
//            $electricityInvoice->dec_amount_block1 = 43;
//            $electricityInvoice->dec_payment_block1 = 43;
//            $electricityInvoice->dec_payment_block2 = 43;
//            $electricityInvoice->dec_payment_block3 = 43;
//            $electricityInvoice->dec_sum = 43;
//            $electricityInvoice->dec_electricity_perk = $electricityBook->dec_electric_perk;
            $electricityInvoice->date_of_filling = date('y-m-d');
            $electricityBook->dec_counter_previous = $electricityInvoice->dec_counter_current;
//            $electricityInvoice->dec_total = 43;
            $electricityInvoice->save();
            $electricityBook->save();


            return $this->redirect(['site/index']);
        } else {
            return $this->render('payment', [
                'electricityInvoice' => $electricityInvoice,
                'electricityBook' => $electricityBook,
                'flat' => $flat,
                'user' => $user,
            ]);
        }
    }
}