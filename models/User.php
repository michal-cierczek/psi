<?php

namespace app\models;

use Yii;
use yii\validators\StringValidator;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;


class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
	const TYPE_ADMIN = 'admin';
	const TYPE_USER = 'author';
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'user';
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
		return static::findOne(['authKey' => $token]);
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
		$this->save();
	}
	public function resetAuthKey(){
		$this->authKey = null;
		$this->save();
	}
	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert)) {
			if($insert) $this->groupId=self::TYPE_USER;
			return true;
		} else {
			return false;
		}
	}
}