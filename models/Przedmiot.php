<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "przedmiot".
 *
 * @property integer $id
 * @property string $kodKursu
 * @property string $wymaganie
 * @property string $nazwaPolska
 * @property string $nazwaAngielska
 * @property integer $kierunekStudiow_id
 * @property integer $published
 * @property integer $grupaKursow
 * @property integer $user_id
 * @property string $litPodstawowa
 * @property string $litUzupelniajaca
 * @property string $rodzaj
 *
 * @property CelKP[] $celKPs
 * @property Kurs[] $kurs
 * @property KierunekStudiow $kierunekStudiow
 * @property User $user
 * @property PrzedmiotKek[] $przedmiotKeks
 * @property Kek[] $keks
 */
class Przedmiot extends \yii\db\ActiveRecord
{
	const opublikowany = [
			'0' => 'NIE',
			'1' => 'TAK',];
	public $nazwa;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'przedmiot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kodKursu', 'nazwaPolska', 'nazwaAngielska', 'kierunekStudiow_id', 'published', 'user_id', 'rodzaj'], 'required', 'message'=>'To pole jest wymagane'],
            [['kierunekStudiow_id', 'published', 'user_id'], 'integer'],
            [['kodKursu', 'wymaganie', 'litPodstawowa', 'litUzupelniajaca'], 'string'],
            [['nazwaPolska', 'nazwaAngielska'], 'string', 'max' => 100, 'message'=>'zbyt długa nazwa'],
            [['kodKursu'], 'unique', 'message'=>'Przedmiot o takim kodzie już istnieje!'],
        	[['grupaKursow'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kodKursu' => 'Kod Przedmiotu',
            'wymaganie' => 'Wymagania wstępne w zakresie wiedzy, umiejętności i innych kompetencji',
            'nazwaPolska' => 'Nazwa Polska',
            'nazwaAngielska' => 'Nazwa Angielska',
            'kierunekStudiow_id' => 'Kierunek Studiow ID',
            'published' => 'Opublikownany',
            'user_id' => 'User ID',
        	'grupaKursow' => 'Grupa kursów',
        	'litPodstawowa' => 'Literatura podstawowa',
        	'litUzupelniajaca' => 'Literatura uzupełniająca',
        	'rodzaj' => 'Rodzaj przedmiotu'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCelKPs()
    {
        return $this->hasMany(CelKP::className(), ['przedmiot_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKurs()
    {
        return $this->hasMany(Kurs::className(), ['przedmiot_id' => 'id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKierunekStudiow()
    {
        return $this->hasOne(KierunekStudiow::className(), ['id' => 'kierunekStudiow_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrzedmiotKeks()
    {
        return $this->hasMany(PrzedmiotKek::className(), ['przedmiot_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeks()
    {
        return $this->hasMany(Kek::className(), ['id' => 'kek_id'])->viaTable('przedmiotKek', ['przedmiot_id' => 'id']);
    }
    
    public function getNazwaKierunku(){
    	return $this->kierunekStudiow ? $this->kierunekStudiow->opis : null;
    }
    
    public function getNazwaSpec(){
    	return $this->kierunekStudiow ?  $this->kierunekStudiow->specjalnosc : null;    
    }
    
    public function getForma(){
    	return $this->kierunekStudiow ?  $this->kierunekStudiow->forma : null;
    }
    
    public function getCykl(){
    	return $this->kierunekStudiow ?  $this->kierunekStudiow->cykl : null;
    }
    
    public function getStopien(){
    	return $this->kierunekStudiow ?  $this->kierunekStudiow->stopien : null;
    }
    
    public function getAutorName()
    {
    	return $this->user->name;
    }
    public function getAutorSurname()
    {
    	return $this->user->surname;
    }
    public function getAutorEmail()
    {
    	return $this->user->email;
    }
}