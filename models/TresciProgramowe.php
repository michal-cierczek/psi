<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tresciProgramowe".
 *
 * @property integer $id
 * @property string $symbol
 * @property string $opis
 * @property integer $liczbaGodzin
 * @property string $formaZajec
 * @property integer $przedmiot_id
 *
 * @property Przedmiot $przedmiot
 */
class TresciProgramowe extends \yii\db\ActiveRecord
{
	const formaProwadzeniaNames = [
			'0' => 'Ćwiczenia',
			'1' => 'Laboratorium',
			'2' => 'Wykład',
			'3' => 'Seminarium',
			'4' => 'Projekt'
	];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tresciProgramowe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['symbol', 'opis', 'liczbaGodzin', 'formaZajec', 'przedmiot_id'], 'required',
            		'message' => 'To pole nie może być puste.'
            ],
            [['opis'], 'string'],
        	[
        		['symbol'],
        		'match', 'pattern'=>'/^[A-Z]{1}[a-z]{1}[[0-9]{1}|[0-9]{2}]$/',
        		'message'=>'Niepoprawna forma. Symbol musi zaczynać się od dużej litery, drugą literą jst mała litera, następnie liczba.'
        	],
        	['liczbaGodzin', 'compare', 'compareValue' => 30, 'operator' => '<=',
        		'message' => 'Zbyt duża wartość.'
        	],
            [['liczbaGodzin', 'przedmiot_id'], 'integer'],
            [['symbol', 'formaZajec'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'symbol' => 'Symbol',
            'opis' => 'Opis',
            'liczbaGodzin' => 'Liczba Godzin',
            'formaZajec' => 'Forma Zajec',
            'przedmiot_id' => 'Przedmiot ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrzedmiot()
    {
        return $this->hasOne(Przedmiot::className(), ['id' => 'przedmiot_id']);
    }
}
