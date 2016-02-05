<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pek".
 *
 * @property integer $id
 * @property string $symbol
 * @property string $opis
 * @property string $kategoria
 * @property integer $przedmiot_id
 *
 * @property Przedmiot $przedmiot
 * @property PekKek[] $pekKeks
 * @property Kek[] $keks
 */
class Pek extends \yii\db\ActiveRecord
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
        return 'pek';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['symbol', 'opis', 'kategoria', 'przedmiot_id'], 'required'],
            [['symbol', 'kategoria'], 'string', 'max' => 45],
            [['opis'], 'string'],
        	[['przedmiot_id'], 'integer'],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekKeks()
    {
        return $this->hasMany(PekKek::className(), ['pek_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeks()
    {
        return $this->hasMany(Kek::className(), ['id' => 'kek_id'])->viaTable('pekKek', ['pek_id' => 'id']);
    }
}
