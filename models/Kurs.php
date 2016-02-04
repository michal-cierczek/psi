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
            [['formaProwadzeniaZajec', 'CMPS', 'ZZU', 'formaZaliczenia', 'bKECTS', 'pECTS', 'ECTS', 'czyKonczacy', 'przedmiot_id'], 'required'],
            [['CMPS', 'ZZU', 'bKECTS', 'pECTS', 'ECTS', 'przedmiot_id'], 'integer'],
            [['formaProwadzeniaZajec'], 'string', 'max' => 45],
            [['formaZaliczenia'], 'string'],
        	[['czyKonczacy'], 'boolean'],
        	[['przedmiot_id'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'formaProwadzeniaZajec' => 'Forma Prowadzenia Zajęć',
            'CMPS' => 'Całkowity Nakład Pracy Studenta (CNPS) [h]',
            'ZZU' => 'Liczba godzin zajęć zorganizowanych w uczelni',
            'formaZaliczenia' => 'Forma Zaliczenia',
            'bKECTS' => 'Liczba punktów ECTS odpowiadająca zajęciom wymagającym bezpośredniego kontaktu (BK)',
            'pECTS' => 'Punkty ECTS odpowiadające zajęciom o charakterze praktycznym (P)',
            'ECTS' => 'Liczba punktów ECTS',
            'czyKonczacy' => 'Kurs kończący dla grupy kursów',
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
