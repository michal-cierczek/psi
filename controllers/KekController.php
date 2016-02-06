<?php

namespace app\controllers;

use Yii;
use app\models\Kek;
use app\models\KekSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

/**
 * KekController implements the CRUD actions for Kek model.
 */
class KekController extends Controller
{

    /**
     * Lists all Kek models.
     * @return mixed
     */
     public function behaviors()
     {
     	return [
     			'access' => [
     					'class' => AccessControl::className(),
     					'only' => ['create','delete'],
     					'ruleConfig' => [
     							'class' => 'app\components\AccessRule' // OUR OWN RULE
     					],
     					'rules' => [
     							[
     									'allow' => true,
     									'actions' => ['create','delete'],
     									'roles' => ['admin'],
     							],
     					],
     			],
     	];
     }
    public function actionIndex($kid = null)
    {
//     	if(is_null($kid))
//     	{
//     		return $this->render('kierunki');
//     	}
//     	else
//     	{
        $searchModel = new KekSearch();
        Yii::trace(Yii::$app->request->getQueryParams());
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
//     		}
    }

    /**
     * Displays a single Kek model.
     * @param integer $id
     * @param integer $Cykl_id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Kek model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kek();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'Cykl_id' => $model->Cykl_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Kek model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $Cykl_id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Kek model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $Cykl_id
     * @return mixed
     */
    public function actionDelete($id, $kid)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['kierunek/update', 'id' => $kid,]);
    }

    /**
     * Finds the Kek model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $Cykl_id
     * @return Kek the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kek::findOne(['id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
