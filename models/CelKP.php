<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "celKP".
 *
 * @property integer $id
 * @property string $opis
 * @property integer $przedmiot_id
 * @property string $symbol
 *
 * @property Przedmiot $przedmiot
 */
class CelKP extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'celKP';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['opis'], 'string'],
            [['przedmiot_id', 'symbol'], 'required',
            		'message' => 'To pole nie może być puste.'
            ],
            [['przedmiot_id'], 'integer'],
        	[['symbol'], 'match', 'pattern'=>'/^C[0-9]{2}$/', 
            	'message'=>'Niepoprawna forma. Symbol musi zaczynać się od znaku "C" i składać się następnie z dwóch cyfr.'	]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'opis' => 'Opis',
            'przedmiot_id' => 'Przedmiot ID',
        	'symbol'=>'Symbol'
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
