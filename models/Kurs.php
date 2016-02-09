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
	
	const formaZaliczeniaNames = [
			'0' => 'Zaliczenie',
			'1' => 'Egzamin',
	];
	const formaProwadzeniaNames = [
			'0' => 'Ćwiczenia',
			'1' => 'Laboratorium',
			'2' => 'Wykład',
			'3' => 'Seminarium',
			'4' => 'Projekt'
	];
	const czyKonczacyNames = [
			'0' => 'Nie',
			'1' => 'Tak'
	];
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
            [['formaProwadzeniaZajec', 'CMPS', 'ZZU', 'formaZaliczenia', 'bKECTS', 'pECTS', 'ECTS', 'czyKonczacy', 'przedmiot_id'], 'required',
            		'message' => 'To pole nie może być puste.'
            ],
            [['CMPS', 'ZZU', 'bKECTS', 'pECTS', 'ECTS', 'przedmiot_id'], 'integer',
            		'message' => 'Wymagana liczba.'
            ],
            [['formaProwadzeniaZajec'], 'string', 'max' => 45],
            [['formaZaliczenia'], 'string'],
        	[['czyKonczacy'], 'boolean'],
        	[['ECTS','bKECTS','pECTS'], 'compare', 'compareValue' => 6, 'operator' => '<=',
        			'message' => 'Wartość nie powinna być większa niż 6 pkt ECTS.'
        	],
        	[['ZZU','bKECTS','pECTS'], 'compare', 'compareValue' => 100, 'operator' => '<=',
        		'message' => 'Wartość nie powinna być większa niż 120.'
        	],
        	['ECTS', 'compare', 'compareValue' => 1, 'operator' => '>=',
        	'message' => 'Wartość nie powinna być mniejsza niż 1 pkt ECTS.'
        	],
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
