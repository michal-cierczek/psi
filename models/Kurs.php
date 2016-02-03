<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kurs".
 *
 * @property integer $id
 * @property string $formaProwadzeniaZajec
 * @property integer $CMPS
 * @property integer $ZZU
 * @property string $formaZaliczenia
 * @property integer $bKECTS
 * @property integer $pECTS
 * @property integer $ECTS
 * @property integer $grupaKursow
 * @property integer $przedmiot_id
 *
 * @property Przedmiot $przedmiot
 */
class Kurs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kurs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['formaProwadzeniaZajec', 'CMPS', 'ZZU', 'formaZaliczenia', 'bKECTS', 'pECTS', 'ECTS', 'grupaKursow', 'przedmiot_id'], 'required'],
            [['CMPS', 'ZZU', 'bKECTS', 'pECTS', 'ECTS', 'grupaKursow', 'przedmiot_id'], 'integer'],
            [['formaProwadzeniaZajec'], 'string', 'max' => 45],
            [['formaZaliczenia'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'formaProwadzeniaZajec' => 'Forma Prowadzenia Zajec',
            'CMPS' => 'Cmps',
            'ZZU' => 'Zzu',
            'formaZaliczenia' => 'Forma Zaliczenia',
            'bKECTS' => 'B Kects',
            'pECTS' => 'P Ects',
            'ECTS' => 'Ects',
            'grupaKursow' => 'Grupa Kursow',
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
