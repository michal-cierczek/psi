<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kierunekStudiow".
 *
 * @property integer $id
 * @property string $opis
 * @property string $cykl
 * @property integer $stopien
 * @property string $skrot
 *
 * @property Kek[] $keks
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
            [['opis', 'cykl', 'stopien'], 'required'],
            [['stopien'], 'integer'],
            [['opis'], 'string', 'max' => 255],
            [['skrot', 'cykl'], 'string', 'max' => 10]
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
        	'cykl' => 'Cykl'
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
    public function getPrzedmiots()
    {
        return $this->hasMany(Przedmiot::className(), ['kierunekStudiow_id' => 'id']);
    }
}