<?php

namespace app\controllers;

use Yii;
use app\models\Cliente;
use app\models\ClienteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClienteController implements the CRUD actions for Cliente model.
 */
class ClienteController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Cliente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClienteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cliente model.
     * @param string $nome
     * @param string $tel
     * @return mixed
     */
    public function actionView($nome, $tel)
    {
        return $this->render('view', [
            'model' => $this->findModel($nome, $tel),
        ]);
    }

    /**
     * Creates a new Cliente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cliente();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nome' => $model->nome, 'tel' => $model->tel]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Cliente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $nome
     * @param string $tel
     * @return mixed
     */
    public function actionUpdate($nome, $tel)
    {
        $model = $this->findModel($nome, $tel);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nome' => $model->nome, 'tel' => $model->tel]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Cliente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $nome
     * @param string $tel
     * @return mixed
     */
    public function actionDelete($nome, $tel)
    {
        $this->findModel($nome, $tel)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cliente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $nome
     * @param string $tel
     * @return Cliente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nome, $tel)
    {
        if (($model = Cliente::findOne(['nome' => $nome, 'tel' => $tel])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
