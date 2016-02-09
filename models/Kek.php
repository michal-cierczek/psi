<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kek".
 *
 * @property integer $id
 * @property string $symbol
 * @property string $opis
 * @property integer $kategoria
 * @property integer $kierunekStudiow_id
 *
 * @property Cykl $cykl
 * @property MekKek[] $mekKeks
 * @property Mek[] $meks
 * @property PekKek[] $pekKeks
 * @property Pek[] $peks
 * @property PrzedmiotKek[] $przedmiotKeks
 * @property Przedmiot[] $przedmiots
 */
class Kek extends \yii\db\ActiveRecord
{
	const categoryName = [
			'0' => 'Wiedza',
			'1' => 'Umiejętności',
			'2' => 'Kompetencje społeczne'
	];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kek';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['symbol', 'opis', 'kategoria'], 'required',
            'message' => 'To pole nie może być puste.'
            ],
            ['kategoria', 'integer'],
            [['opis'], 'string',
            'message' => 'Zbyt długi ciąg znaków.'
            ],
        	[['kierunekStudiow_id'], 'safe']
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
            'kategoria' => 'Kategoria',
        ];
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMekKeks()
    {
        return $this->hasMany(MekKek::className(), ['kek_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeks()
    {
        return $this->hasMany(Mek::className(), ['id' => 'mek_id'])->viaTable('mekKek', ['kek_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekKeks()
    {
        return $this->hasMany(PekKek::className(), ['kek_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeks()
    {
        return $this->hasMany(Pek::className(), ['id' => 'pek_id'])->viaTable('pekKek', ['kek_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrzedmiotKeks()
    {
        return $this->hasMany(PrzedmiotKek::className(), ['kek_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrzedmiots()
    {
        return $this->hasMany(Przedmiot::className(), ['id' => 'przedmiot_id'])->viaTable('przedmiotKek', ['kek_id' => 'id']);
    }
    public static function keksForSelect2($kid, $pid)
    {
    	$result = [
    		'Wiedza' => [],
    		'Umiejętności' => [],
    		'Kompetencje społeczne' => []
    	];
    	foreach(Kek::findBySql('SELECT * FROM kek WHERE kierunekStudiow_id=' . $kid . ' AND id NOT IN (SELECT kek_id FROM przedmiotKek WHERE przedmiot_id=' . $pid . ')')->each() as $kek){
    		$result[static::categoryName[$kek->kategoria]][$kek->id] = $kek->symbol . ': ' . $kek->opis; 
    		Yii::trace('kategoria: ' . static::categoryName[$kek->kategoria]);
    	}
    	 Yii::trace($result);
    	return $result;
    }
    public static function keksForMS($kid, $pid)
    {
    	$result = [
    			'Wiedza' => [],
    			'Umiejętności' => [],
    			'Kompetencje społeczne' => []
    	];
    	foreach(Kek::findBySql('SELECT * FROM kek WHERE kierunekStudiow_id=' . $kid . ' AND id NOT IN (SELECT kek_id FROM przedmiotKek WHERE przedmiot_id=' . $pid . ')')->each() as $kek){
    		$result[static::categoryName[$kek->kategoria]][$kek->id] = $kek->symbol . ': ' . $kek->opis;
    		Yii::trace('kategoria: ' . static::categoryName[$kek->kategoria]);
    	}
    	Yii::trace($result);
    	return $result;
    }
}
