<?php

namespace app\controllers;

use Yii;
use app\models\Przedmiot;
use app\models\PrzedmiotSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PrzedmiotController implements the CRUD actions for Przedmiot model.
 */
class PrzedmiotController extends Controller
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
     * Lists all Przedmiot models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PrzedmiotSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Przedmiot model.
     * @param integer $id
     * @param integer $kierunekStudiow_id
     * @param integer $user_id
     * @return mixed
     */
    public function actionView($id, $kierunekStudiow_id, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $kierunekStudiow_id, $user_id),
        ]);
    }

    /**
     * Creates a new Przedmiot model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Przedmiot();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'kierunekStudiow_id' => $model->kierunekStudiow_id, 'user_id' => $model->user_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Przedmiot model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $kierunekStudiow_id
     * @param integer $user_id
     * @return mixed
     */
    public function actionUpdate($step, $id=null)
    {
    	switch($step){
    		case '1':
    			if(!($model = Przedmiot::find()->where(['id' => $id, 'user_id' => Yii::$app->user->id])->one()))
    				$model = new Przedmiot();
    			break;
    		case '2':
    			break;
    		case '3':
    			if(!($model = Przedmiot::find() -> where(['id' => $id]) -> one()))
    				$model = new Przedmiot();
    			break;	
    	}
    	
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		$step++;
    		return $this->redirect(['update', 'id' => $id, 'step'=>$step]);
    	}
    	Yii::trace($model);
    	Yii::trace($model->nazwaKierunku);
    	return $this->render('update', ['model' => $model, 'step' => $step]);      
    }

    /**
     * Deletes an existing Przedmiot model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $kierunekStudiow_id
     * @param integer $user_id
     * @return mixed
     */
    public function actionDelete($id, $kierunekStudiow_id, $user_id)
    {
        $this->findModel($id, $kierunekStudiow_id, $user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Przedmiot model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $kierunekStudiow_id
     * @param integer $user_id
     * @return Przedmiot the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $kierunekStudiow_id, $user_id)
    {
        if (($model = Przedmiot::findOne(['id' => $id, 'kierunekStudiow_id' => $kierunekStudiow_id, 'user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
