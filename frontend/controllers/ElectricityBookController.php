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
use kartik\mpdf\Pdf;
use yii\swiftmailer\Mailer;

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

    public function actionCharts()
    {
        $userID = Yii::$app->user->getId();
        $user = User::findOne($userID);
        $flat = Flat::findOne(['user_id'=> $userID]);
        $electricityBookId = $flat->paybook->electricBook->electricity_book_id;
        $electricityInvoices = ElectricityInvoice::find()
            ->where(['electric_book_id' => $electricityBookId])
            ->all();




        $type = Yii::$app->request->post('selectType');

        switch($type)
        {
            case 0:
                $type = 0;
                break;
            case 1:
                $type = 1;
                break;
            case 2:
                $type = 2;
                break;
        }


        foreach($electricityInvoices as $key => $value){
            $payments[] = $value->dec_total;
            $amounts[] = $value->dec_substraction;
            $dates[] = $value->date_of_filling;
        }

        return $this->render('charts',[
            'electricityInvoices' => $electricityInvoices,
            'flat' => $flat,
            'user' => $user,
            'type' => $type,
            'payments' => $payments,
            'amounts' => $amounts,
            'dates' => $dates,
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

            $this->actionPdfInvoice();
            $this->actionSendPdfInvoice();


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

    public function actionPdfInvoice() {

        $userID = Yii::$app->user->getId();
        $user = User::findOne($userID);
        $flat = Flat::findOne(['user_id'=> $userID]);
        $electricityBook = $flat->paybook->electricBook;
        $electricityInvoice = $electricityBook->electricityInvoices[1];
//        $electricityInvoice = new ElectricityInvoice();
        $path = '@web/css/styleUtilities.css';
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'format' => Pdf::FORMAT_A4,
            'filename' => Yii::getAlias('@webroot') . '/attachments/index5.pdf',
            'destination' => Pdf::DEST_FILE,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'cssFile' => '@webroot/css/pdfElectricityInvoice.css',
            'content' => $this->renderPartial('pdfElectricityInvoice', [
                'electricityInvoice' => $electricityInvoice,
                'electricityBook' => $electricityBook,
                'flat' => $flat,
                'user' => $user,
            ]),
            'options' => [
                'tempPath' => '@webroot/attachments',
            ],
            'methods' => [
                'SetHeader' => ['Сгенерировано с помощью: Osbb-online||Дата оплаты: ' . $electricityInvoice->date_of_filling],
                'SetFooter' => ['|Страница {PAGENO}|'],

            ]
        ]);
        return $pdf->render();
    }

    public function actionSendPdfInvoice()
    {

        Yii::$app->mail->compose()
            ->setFrom('nikita.mintus@gmail.com')
            ->setTo('nikita_mintus@mail.ru')
            ->setSubject('Email sent from Yii2-Swiftmailer')
            ->setTextBody('ХУЯКА 2')
            ->attach(Yii::getAlias('@webroot') . '/attachments/index5.pdf')
            ->send();
    }
}