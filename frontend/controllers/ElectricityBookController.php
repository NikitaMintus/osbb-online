<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 16.04.2016
 * Time: 15:56
 */

namespace frontend\controllers;


use backend\models\electricity\ElectricityInvoice;
use backend\models\electricity\ElectricityInvoiceSearch;
use backend\models\flat\Flat;
use backend\models\flat\Paybook;
use common\models\User;
use Swift_TransportException;
use yii\base\Exception;
use yii\web\Controller;
use Yii;
use yii\data\ActiveDataProvider;
use backend\models\electricity\ElectricityBook;
use yii\widgets\ActiveForm;
use kartik\mpdf\Pdf;
use yii\swiftmailer\Mailer;
use DateTime;

class ElectricityBookController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ElectricityBook::find()->with('electricityInvoice'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionInvoices()
    {
        $searchModel = new ElectricityInvoiceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('invoices', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionView($id)
    {
        $model = ElectricityInvoice::findOne($id);
        return $this->render('view', [
            'model' => $model,
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

        $date = new DateTime(date('d-m-Y'));
        $date->modify('-1 month');

        $dateFrom = $date->format('d-m-Y');
        $dateTo = date('d-m-Y');
        $type = 0;
        if(Yii::$app->request->isPost)
        {
            $type = Yii::$app->request->post('selectType');
            $dateFrom = Yii::$app->request->post('dateFrom');
            $dateTo = Yii::$app->request->post('dateTo');
        }

        foreach($electricityInvoices as $key => $value){
            $dateOfFilling = date('d-m-Y', strtotime($value->date_of_filling));
            if(strtotime($dateOfFilling) >= strtotime($dateFrom) && strtotime($dateOfFilling) <= strtotime($dateTo))
            {
                $dates[] = $dateOfFilling;
                $payments[] = $value->dec_total;
                $amounts[] = $value->dec_substraction;
            }
        }

        return $this->render('charts',[
            'electricityInvoices' => $electricityInvoices,
            'flat' => $flat,
            'user' => $user,
            'type' => $type,
            'payments' => $payments,
            'amounts' => $amounts,
            'dates' => $dates,
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
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
            $electricityInvoice->date_of_filling = date('y-m-d');
            $electricityBook->dec_counter_previous = $electricityInvoice->dec_counter_current;

            $electricityInvoice->save();
            $electricityBook->save();

            try
            {
                $this->actionSendPdfInvoice($electricityInvoice->electricity_invoice_id);
            }
            catch(Swift_TransportException $e)
            {
                return $this->redirect(['/electricity-book/invoices']);
            }

            return $this->redirect(['/electricity-book/invoices']);
        } else {
            return $this->render('payment', [
                'electricityInvoice' => $electricityInvoice,
                'electricityBook' => $electricityBook,
                'flat' => $flat,
                'user' => $user,
            ]);
        }
    }

    public function createPdf($id)
    {

        $userID = Yii::$app->user->getId();
        $user = User::findOne($userID);
        $flat = Flat::findOne(['user_id'=> $userID]);
        $electricityBook = $flat->paybook->electricBook;
        $electricityInvoice = ElectricityInvoice::findOne($id);

        $path = '@webroot/css/pdfElectricityInvoice.css';

        $content = $this->renderPartial('pdfElectricityInvoice', [
            'electricityInvoice' => $electricityInvoice,
            'electricityBook' => $electricityBook,
            'flat' => $flat,
            'user' => $user,
        ]);

        $pdf = new Pdf(['cssFile' => '@webroot/css/pdfElectricityInvoice.css']); // or new Pdf();
//        $pdf->cssFile = '@webroot/css/pdfElectricityInvoice.css';
        $mpdf = $pdf->api; // fetches mpdf api
//        $mpdf->cssFile = $path;
        $mpdf->SetHeader('Osbb-online квитанция за оплату электроэнергии'); // call methods or set any properties
        $mpdf->WriteHtml($content); // call mpdf write html
        $mpdf->Output('attachments/index.pdf', 'F'); // call the mpdf api output as needed

    }

    public function createStandartPdf($id)
    {
        $userID = Yii::$app->user->getId();
        $user = User::findOne($userID);
        $flat = Flat::findOne(['user_id'=> $userID]);
        $electricityBook = $flat->paybook->electricBook;
        $electricityInvoice = ElectricityInvoice::findOne($id);

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
        $pdf->configure([
            'methods' => [
                'SetHeader' => ['Сгенерировано с помощью: Osbb-online||Дата оплаты: ' . $electricityInvoice->date_of_filling],
                'SetFooter' => ['|Страница {PAGENO}|'],
            ]
        ]);

        $pdf->output($pdf->content, 'attachments/index.pdf', 'F');
    }

    public function actionPdfInvoice($id) {

        $userID = Yii::$app->user->getId();
        $user = User::findOne($userID);
        $flat = Flat::findOne(['user_id'=> $userID]);
        $electricityBook = $flat->paybook->electricBook;
        $electricityInvoice = ElectricityInvoice::findOne($id);

        $path = '@web/css/styleUtilities.css';
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'format' => Pdf::FORMAT_A4,
            'filename' => Yii::getAlias('@webroot') . '/attachments/index5.pdf',
            'destination' => Pdf::DEST_BROWSER,
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

    public function actionSendPdfInvoice($id)
    {
        $this->createStandartPdf($id);

        Yii::$app->mail->compose()
            ->setFrom('nikita.mintus@gmail.com')
            ->setTo('nikita_mintus@mail.ru')
            ->setSubject('Письмо отправлено Osbb-online')
            ->setTextBody('Ваша оплата за электроэнергию')
            ->attach(Yii::getAlias('@webroot') . '/attachments/index.pdf')
            ->send();

        return $this->redirect(['/electricity-book/view', 'id' => $id]);

    }
}