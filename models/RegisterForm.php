<?php

namespace app\models;

use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class RegisterForm extends Model
{
    public $username;
    public $password;
    public $confirmPassword;
    public $name;
    public $surname;
    public $email;

    public function rules()
    {
        return [
            [
            	['username', 'password', 'confirmPassword', 'name', 'surname', 'email'],
            	'required',
            	'message' => 'To pole nie może być puste.'
            ],
        	['email', 'email', 'message'=>'Niepoprawny adres email!'],
        	[
        		['name', 'surname'],
        		'string', 
        		'message' => 'Zastosowano niedopuszczalne znaki.'        			
        	],
        	[
        		'username', 
        		'unique', 
        		'targetClass'=>'app\models\User', 
        		'targetAttribute'=>'username', 
        		'message'=>'Podany login jest zajęty.'
        	],
            [
            	['password','confirmPassword'], 
            	'match', 'pattern'=>'/(?=.*[a-z])(?=.*[A-Z])(?=.*\d){6,}/', 
            	'message'=>'Hasło musi zawierać co najmniej jedną dużą literę, jedną małą literę i jedną cyfrę oraz musi mieć co najmniej 6 znaków.'	
            ],
        	['confirmPassword', 'compare', 'compareAttribute'=>'password', 'message'=>'podane hasła są różne'],
        ];
    }

    public function attributeLabels()
    {
    	return [
    			'username' => 'Nazwa użytkownika',
    			'password' => 'Hasło',
    			'confirmPassword' => 'Potwierdź hasło',
    			'name' => 'Imię',
    			'surname' => 'Nazwisko',
    			'email' => 'Adres email'
    	];
    }
}
