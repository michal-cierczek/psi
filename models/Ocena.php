<?php

namespace app\models;

use Yii;
use app\models\Pek;

/**
 * This is the model class for table "ocenaOsiagnieciaPek".
 *
 * @property integer $id
 * @property string $symbol
 * @property string $opis
 *
 * @property OcenaOsiagnieciaPekpek[] $ocenaOsiagnieciaPekpeks
 * @property Pek[] $peks
 */
class Ocena extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ocenaOsiagnieciaPek';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['symbol', 'opis'], 'required',
            		'message' => 'To pole nie może być puste.'
            ],
        	[
        		['symbol'],
        		'match', 'pattern'=>'/^[F|P][[0-9]{1}|[0-9]{2}]$/',
        		'message'=>'Niepoprawna forma. Symbol musi zaczynać się od dużej litery F lub P, dalej musi być liczba.'
        	],
            [['opis'], 'string'],
            [['symbol'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Idocena Osiagniecia Pek',
            'symbol' => 'Symbol',
            'opis' => 'Opis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOcenaOsiagnieciaPekpeks()
    {
        return $this->hasMany(OcenaOsiagnieciaPekpek::className(), ['ocenaOsiagnieciaPek_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeks()
    {
        return $this->hasMany(Pek::className(), ['id' => 'pek_id'])->viaTable('ocenaOsiagnieciaPekpek', ['ocenaOsiagnieciaPek_id' => 'id']);
    }
    public function getallpeks($id)
    {
    	Pek::find()->where(['przedmiot_id'=>$id])->asArray()->all();
    }
    
    public static function peksForMultiselect($id){
    	$result = [];
    	foreach(Pek::find()->where(['przedmiot_id' => $id])->each() as $pek){
    		$result[$pek->id] = $pek->symbol . ': ' . $pek->opis;
    	}
    	
    	return $result;
    }

}
