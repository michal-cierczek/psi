<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kierunekStudiow".
 *
 * @property integer $id
 * @property string $opis
 * @property integer $cykl_id
 * @property integer $stopien
 * @property string $skrot
 *
 * @property Kek[] $keks
 * @property Cykl $cykl
 * @property Przedmiot[] $przedmiots
 * @property Specjalnosc[] $specjalnoscs
 */
class Kierunek extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kierunekStudiow';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['opis', 'cykl_id', 'stopien'], 'required'],
            [['cykl_id', 'stopien'], 'integer'],
            [['opis'], 'string', 'max' => 255],
            [['skrot'], 'string', 'max' => 10]
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
            'cykl_id' => 'Cykl ID',
            'stopien' => 'Stopien',
            'skrot' => 'Skrot',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeks()
    {
        return $this->hasMany(Kek::className(), ['kierunekStudiow_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCykl()
    {
        return $this->hasOne(Cykl::className(), ['id' => 'cykl_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrzedmiots()
    {
        return $this->hasMany(Przedmiot::className(), ['kierunekStudiow_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecjalnoscs()
    {
        return $this->hasMany(Specjalnosc::className(), ['kierunekStudiow_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCyklName() {
    	return $this->cykl ? $this->cykl->data : null;
    }
}