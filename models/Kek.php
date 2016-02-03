<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kek".
 *
 * @property integer $id
 * @property string $symbol
 * @property string $opis
 * @property integer $Cykl_id
 * @property integer $kategoria
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
			'1' => 'Wiedza',
			'2' => 'Umiejętności',
			'3' => 'Kompetencje społeczne'
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
            [['symbol', 'opis', 'Cykl_id', 'kategoria'], 'required'],
            [['Cykl_id', 'kategoria'], 'integer'],
            [['symbol'], 'string', 'max' => 45],
            [['opis'], 'string', 'max' => 255]
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
            'Cykl_id' => 'Cykl ID',
            'kategoria' => 'Kategoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCykl()
    {
        return $this->hasOne(Cykl::className(), ['id' => 'Cykl_id']);
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
}
