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
 * @property integer $user_id
 *
 * @property CelKP[] $celKPs
 * @property Kurs[] $kurs
 * @property Literatura[] $literaturas
 * @property KierunekStudiow $kierunekStudiow
 * @property User $user
 * @property PrzedmiotKek[] $przedmiotKeks
 * @property Kek[] $keks
 */
class Przedmiot extends \yii\db\ActiveRecord
{
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
            [['kodKursu', 'wymaganie', 'nazwaPolska', 'nazwaAngielska', 'kierunekStudiow_id', 'published', 'user_id'], 'required'],
            [['kierunekStudiow_id', 'published', 'user_id'], 'integer'],
            [['kodKursu', 'wymaganie'], 'string', 'max' => 45],
            [['nazwaPolska', 'nazwaAngielska'], 'string', 'max' => 100],
            [['kodKursu'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kodKursu' => 'Kod Kursu',
            'wymaganie' => 'Wymaganie',
            'nazwaPolska' => 'Nazwa Polska',
            'nazwaAngielska' => 'Nazwa Angielska',
            'kierunekStudiow_id' => 'Kierunek Studiow ID',
            'published' => 'Published',
            'user_id' => 'User ID',
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
    public function getLiteraturas()
    {
        return $this->hasMany(Literatura::className(), ['przedmiot_id' => 'id']);
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
}
