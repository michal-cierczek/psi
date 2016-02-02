<?php

namespace app\models;

use Yii;
use yii\validators\StringValidator;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;


class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'users';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['username', 'password'], 'safe']
		];
	}
	public function attributeLabels()
	{
		return [
				'username' => 'Login',
				'password' => 'Hasło',
		];
	}
	
	public static function findIdentity($id)
	{
		return static::findOne($id);
	}
	public static function findIdentityByAccessToken($token, $type = null)
	{
		return static::findOne(['accessToken' => $token]);
	}
	public static function findByUsername ($us)
	{
		return static::findOne(['username' => $us]);
	}
	public function getId ()
	{
		return $this->getPrimaryKey();
	}
	public function getAuthKey ()
	{
		return $this->authKey;
	}
	public function validateAuthKey ($authKey)
	{
		return $this->getAuthKey() === $authKey;
	}
	public function validatePassword ($password)
	{
		return $this->password === Yii::$app->getSecurity()->generatePasswordHash($password);
		//return $this->userPassword === $password;
	}
	public function setPassword ($password)
	{
		$this->password=Yii::$app->getSecurity()->generatePasswordHash($password);
	}
	public function generateAuthKey ()
	{
		$this->authKey=Yii::$app->getSecurity()->generateRandomString();
	}
}