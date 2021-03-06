<?php

namespace backend\controllers;

use backend\models\flat\Owner;
use Yii;
use backend\models\flat\Flat;
use backend\models\flat\FlatSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FlatController implements the CRUD actions for Flat model.
 */

class FlatController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ],
        ];
    }

    /**
     * Lists all Flat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FlatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Flat model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Flat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Flat();
        $owner = new Owner();
        if ($model->load(Yii::$app->request->post())) {
            if($owner->load(Yii::$app->request->post())) {
                $model->owner_id = $model->flat_id;
                $owner->owner_id = $model->owner_id;
//                $owner->person_id = 1;
                $owner->save();
                $model->save();
            }

            return $this->redirect(['view', 'id' => $model->flat_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'owner' => $owner,
            ]);
        }
    }

    /**
     * Updates an existing Flat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $owner = $model->owner;

        if ($model->load(Yii::$app->request->post()) && $owner->load(Yii::$app->request->post())) {
            $model->save();
            $owner->save();
            return $this->redirect(['view', 'id' => $model->flat_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'owner' => $owner,
            ]);
        }
    }

    /**
     * Deletes an existing Flat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Flat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Flat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Flat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
