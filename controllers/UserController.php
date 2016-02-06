<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\User;
use yii\web\Response;
use yii\widgets\ActiveForm;

class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['register'],
            	'ruleConfig' => [
            		'class' => 'app\components\AccessRule' // OUR OWN RULE
            	],
                'rules' => [
                    [
                        'actions' => ['register'],
                        'allow' => true,
                        'roles' => ['1'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        	
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
        	Yii::$app->user->identity->generateAuthKey();
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
    	Yii::$app->user->identity->resetAuthKey();
        Yii::$app->user->logout();
        return $this->goHome();
    }
    
    public function actionRegister()
    {
//     	if (!\Yii::$app->user->isGuest) {
//     		return $this->goHome();	 
//     	}
    	
    	$model = new RegisterForm();
    	if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
    	{
    		Yii::$app->response->format=Response::FORMAT_JSON;
    		return ActiveForm::validate($model, 'username');
    	}
    	if ($model->load(Yii::$app->request->post())){
    		if($model->validate()){
    			$user = new User();
    			$user->username = $model->username;
    			$user->setPassword($model->password);
    			$user->email = $model->email;
    			$user->name = $model->name;
    			$user->surname = $model->surname;
    			
    			Yii::trace($user);
    			if($user->save(false)) return $this->redirect('/user/login');
    		}
    	}
    	return $this->render('register', [
    			'model' => $model,
    	]);
    
    }
}
