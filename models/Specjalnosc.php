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
class Specjalnosc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'specjalnosc';
    }
}
