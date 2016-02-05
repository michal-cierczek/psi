<?php

namespace app\controllers;

use Yii;
use app\models\Przedmiot;
use app\models\PrzedmiotSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\CelKPSearch;
use app\models\KursSearch;
use app\models\CelKP;
use app\models\Kurs;
use app\models\Pek;
use app\models\PekSearch;
use app\models\NarzedziaDydaktyczne;
use app\models\NarzedziaDydaktyczneSearch;
use app\models\TresciProgramowe;
use app\models\TresciProgramoweSearch;
use yii\filters\AccessControl;
use yii\data\SqlDataProvider;
use yii\helpers\Url;
use app\models\Ocena;
use app\models\OcenaSearch;

/**
 * PrzedmiotController implements the CRUD actions for Przedmiot model.
 */
class PrzedmiotController extends Controller
{
    public function behaviors()
    {
        return [
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
						return $this->redirect(Url::to(['/user/login']));
						}
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
// 		$dataProvider = new SqlDataProvider([
// 		    'sql' => 'SELECT * FROM przedmiot WHERE user_id=' . Yii::$app->user->id,
		   
// 		]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndex2()
    {
    	$searchModel = new PrzedmiotSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
    	return $this->render('index2', [
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
    	$forModal = null;
    	switch($step){
    		case '1':
    			if(!($model = Przedmiot::find()->where(['id' => $id])->one()))
    				$model = new Przedmiot();
    			break;
    		case '2':
    			$forModal = new Kurs();
    			$searchModel = new KursSearch();
    			$model = $searchModel->search(['przedmiot_id'=> $id]);
    			break;
    		case '3': // wymagania
    			if(!($model = Przedmiot::find() -> where(['id' => $id]) -> one()))
    				$model = new Przedmiot();
    			break;
    		case '4': // celKP
    			$forModal = new CelKP();
    			$searchModel = new CelKPSearch();
        		$model = $searchModel->search(['przedmiot_id'=> $id]);
    			break;
    		case '5': // pek
    			$forModal = new Pek();
    			$searchModel = new PekSearch();
    			$model = $searchModel->search(['przedmiot_id'=> $id]);
    			break;
    		case '6': // tresci programowe
    			$forModal = new TresciProgramowe();
    			$searchModel = new TresciProgramoweSearch();
    			$model = $searchModel->search(['przedmiot_id'=> $id]);
    			break;
    		case '7': // narzedziaDydaktyczne
    			$forModal = new NarzedziaDydaktyczne();
    			$searchModel = new NarzedziaDydaktyczneSearch();
    			$model = $searchModel->search(['przedmiot_id'=> $id]);
    				break;
    		case '8': // ocena osiagniecie pek
    			$forModal = new Ocena();
    			$searchModel = new OcenaSearch();
    			$model = $searchModel->search(['przedmiot_id'=> $id]);
    			break;
    		case '9': // literatura
    			if(!($model = Przedmiot::find() -> where(['id' => $id]) -> one()))
    				$model = new Przedmiot();
    			break;
    		case '10': // opiekun
    			if(!($model = Przedmiot::find() -> where(['id' => $id]) -> one()))
    				$model = new Przedmiot();
    			break;
    	}
    	
    	if ($step != 2 && $step != 4 && $step != 5 && $step != 6 && $step != 7 && $step != 8 && $model->load(Yii::$app->request->post()) && $model->save()) {
    		$step++;
    		return $this->redirect(['update', 'id' => $id, 'step'=>$step]);
    	}else{
    		if($step==4 && $forModal->load(Yii::$app->request->post()) && $forModal->save()){
    			$forModal = new CelKP();
    		}
    		elseif($step==2 && $forModal->load(Yii::$app->request->post()) && $forModal->save()){
    			$forModal = new Kurs();
    		}
    		elseif($step==5 && $forModal->load(Yii::$app->request->post()) && $forModal->save()){
    			$forModal = new Pek();
    		}
    		elseif($step==6 && $forModal->load(Yii::$app->request->post()) && $forModal->save()){
    			$forModal = new TresciProgramowe();
    		}
    		elseif($step==7 && $forModal->load(Yii::$app->request->post()) && $forModal->save()){
    			$forModal = new NarzedziaDydaktyczne();
    		}
    		elseif($step==8 && $forModal->load(Yii::$app->request->post()) && $forModal->save()){
    			$forModal = new Ocena();
    		}
    	}
    	return $this->render('update', ['model' => $model, 'id' => $id, 'step' => $step, 'forModal' => $forModal]);      
    }

    /**
     * Deletes an existing Przedmiot model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $kierunekStudiow_id
     * @param integer $user_id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

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
    protected function findModel($id)
    {
        if (($model = Przedmiot::findOne(['id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
<?php

namespace app\controllers;

use Yii;
use app\models\Przedmiot;
use app\models\PrzedmiotSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Literatura;
use app\models\CelKPSearch;
use app\models\KursSearch;
use app\models\CelKP;
use app\models\Kurs;
use app\models\Pek;
use app\models\PekSearch;
use app\models\NarzedziaDydaktyczne;
use app\models\NarzedziaDydaktyczneSearch;
use app\models\TresciProgramowe;
use app\models\TresciProgramoweSearch;
use yii\filters\AccessControl;
use yii\data\SqlDataProvider;

use app\models\Ocena;
use app\models\OcenaSearch;

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
     * Lists all Przedmiot models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PrzedmiotSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
// 		$dataProvider = new SqlDataProvider([
// 		    'sql' => 'SELECT * FROM przedmiot WHERE user_id=' . Yii::$app->user->id,
		   
// 		]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndex2()
    {
    	$searchModel = new PrzedmiotSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
    	return $this->render('index2', [
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
        $forModal = null;
    	switch($step){
    		case '12':
    				$model = new Przedmiot();
    			break;
    	}
    	
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		if(step!=11)
    		{
    			return $this->redirect(['update', 'id' => $id, 'step'=>$step]);
    			$step++;
    		}
    		else 
    		{
    			return $this->redirect(['index']);
    		}
    		
    	}else{
    		if($step==4 && $forModal->load(Yii::$app->request->post()) && $forModal->save()){
    			$forModal = new CelKP();
    		}
    		elseif($step==2 && $forModal->load(Yii::$app->request->post()) && $forModal->save()){
    			$forModal = new Kurs();
    		}
    		elseif($step==5 && $forModal->load(Yii::$app->request->post()) && $forModal->save()){
    			$forModal = new Pek();
    		}
    		elseif($step==6 && $forModal->load(Yii::$app->request->post()) && $forModal->save()){
    			$forModal = new TresciProgramowe();
    		}
    		elseif($step==7 && $forModal->load(Yii::$app->request->post()) && $forModal->save()){
    			$forModal = new NarzedziaDydaktyczne();
    		}
    		elseif($step==8 && $forModal->load(Yii::$app->request->post()) && $forModal->save()){
    			$forModal = new Ocena();
    		}
    	}
    	return $this->render('update', ['model' => $model, 'id' => $id, 'step' => $step, 'forModal' => $forModal]);      
   
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
    	$forModal = null;
    	switch($step){
    		case '1':
    			if(!($model = Przedmiot::find()->where(['id' => $id])->one()))
    				$model = new Przedmiot();
    			break;
    		case '2':
    			$forModal = new Kurs();
    			$searchModel = new KursSearch();
    			$model = $searchModel->search(['przedmiot_id'=> $id]);
    			break;
    		case '3': // wymagania
    			if(!($model = Przedmiot::find() -> where(['id' => $id]) -> one()))
    				$model = new Przedmiot();
    			break;
    		case '4': // celKP
    			$forModal = new CelKP();
    			$searchModel = new CelKPSearch();
        		$model = $searchModel->search(['przedmiot_id'=> $id]);
    			break;
    		case '5': // pek
    			$forModal = new Pek();
    			$searchModel = new PekSearch();
    			$model = $searchModel->search(['przedmiot_id'=> $id]);
    			break;
    		case '6': // tresci programowe
    			$forModal = new TresciProgramowe();
    			$searchModel = new TresciProgramoweSearch();
    			$model = $searchModel->search(['przedmiot_id'=> $id]);
    			break;
    		case '7': // narzedziaDydaktyczne
    			$forModal = new NarzedziaDydaktyczne();
    			$searchModel = new NarzedziaDydaktyczneSearch();
    			$model = $searchModel->search(['przedmiot_id'=> $id]);
    				break;
    		case '8': // ocena osiagniecie pek
    			$forModal = new Ocena();
    			$searchModel = new OcenaSearch();
    			$model = $searchModel->search(['przedmiot_id'=> $id]);
    			break;
    		case '9': // literatura
    			if(!($model = Przedmiot::find() -> where(['id' => $id]) -> one()))
    				$model = new Przedmiot();
    			break;
    		case '10': // opiekun
    			if(!($model = Przedmiot::find() -> where(['id' => $id]) -> one()))
    				$model = new Przedmiot();
    			break;
    	}
    	
    	if ($step != 2 && $step != 4 && $step != 5 && $step != 6 && $step != 7 && $step != 8 && $model->load(Yii::$app->request->post()) && $model->save()) {
    		if(step!=11)
    		{
    			return $this->redirect(['update', 'id' => $id, 'step'=>$step]);
    			$step++;
    		}
    		else 
    		{
    			return $this->redirect(['index']);
    		}
    		
    	}else{
    		if($step==4 && $forModal->load(Yii::$app->request->post()) && $forModal->save()){
    			$forModal = new CelKP();
    		}
    		elseif($step==2 && $forModal->load(Yii::$app->request->post()) && $forModal->save()){
    			$forModal = new Kurs();
    		}
    		elseif($step==5 && $forModal->load(Yii::$app->request->post()) && $forModal->save()){
    			$forModal = new Pek();
    		}
    		elseif($step==6 && $forModal->load(Yii::$app->request->post()) && $forModal->save()){
    			$forModal = new TresciProgramowe();
    		}
    		elseif($step==7 && $forModal->load(Yii::$app->request->post()) && $forModal->save()){
    			$forModal = new NarzedziaDydaktyczne();
    		}
    		elseif($step==8 && $forModal->load(Yii::$app->request->post()) && $forModal->save()){
    			$forModal = new Ocena();
    		}
    	}
    	return $this->render('update', ['model' => $model, 'id' => $id, 'step' => $step, 'forModal' => $forModal]);      
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
