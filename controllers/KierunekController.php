<?php

namespace app\controllers;

use Yii;
use app\models\Kierunek;
use app\models\KierunekSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Kek;
use app\models\KekSearch;
use yii\filters\AccessControl;

/**
 * KierunekController implements the CRUD actions for Kierunek model.
 */
class KierunekController extends Controller
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
        		'access' => [
        				'class' => AccessControl::className(),
        				'only' => ['index'],
        				'rules' => [
        						[
        								'allow' => true,
        								'actions' => ['index'],
        								'roles' => ['@'],
        						],
        				],
        				'denyCallback' => function ($rule, $action) {
        				throw new \Exception('You are not allowed to access this page');
        				}
        			],
        ];
    }

    /**
     * Lists all Kierunek models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KierunekSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kierunek model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $forModal = new Kek();
    	$searchModel = new KekSearch();
    	$model = $searchModel->search(['kierunekStudiow_id'=> $id]);

        return $this->render('view', ['model' => $model, 'id' => $id, 'forModal' => $forModal]);
    }

    /**
     * Creates a new Kierunek model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kierunek();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Kierunek model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id=null)
    {
    	$forModal=new Kek();
    	$searchModel = new KekSearch();
    	$model = $searchModel->search(['kierunekStudiow'=>$id]);
    	
    	
    	
    	if($forModal->load(Yii::$app->request->post()) && $forModal->save()){
        	$forModal = new Kek();
        	
    	}
    	return $this->render('update', ['model' => $model, 'id' => $id, 'forModal' => $forModal]);
    	
    	
    	
    }

    /**
     * Deletes an existing Kierunek model.
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
     * Finds the Kierunek model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kierunek the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kierunek::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
