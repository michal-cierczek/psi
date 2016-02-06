<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\ContactForm;
use yii\helpers\Url;

class SiteController extends Controller {
	
	public function behaviors()
	{
		return [
				'access' => [
						'class' => AccessControl::className(),
						'only' => ['about','contact'],
						'rules' => [
								[
										'allow' => true,
										'actions' => ['about','contact',],
										'roles' => ['@'],
								],
						],
						'denyCallback' => function ($rule, $action) {
						return $this->redirect(Url::to(['/user/login']));
						}
						],
				
						];
	}
	
	public function actions() {
		return [ 
				'error' => [ 
						'class' => 'yii\web\ErrorAction' 
				],
				'captcha' => [ 
						'class' => 'yii\captcha\CaptchaAction',
						'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null 
				] 
		];
	}
	public function actionIndex() {

		return $this->render ( 'index' );
	}
	public function actionContact() {
		$model = new ContactForm ();
		
		if ($model->load ( Yii::$app->request->post () ) && $model->contact ( Yii::$app->params ['adminEmail'] )) {
			Yii::$app->session->setFlash ( 'contactFormSubmitted' );
			
			return $this->refresh ();
		}
		return $this->render ( 'contact', [ 
				'model' => $model 
		] );
	}
	public function actionAbout() {
		return $this->render ( 'about' );
	}
}
