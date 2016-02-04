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
            [['przedmiot_id'], 'integer'],
            [['symbol', 'kategoria'], 'string', 'max' => 45],
            [['opis'], 'string', 'max' => 255],
            [['symbol'], 'unique']
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
