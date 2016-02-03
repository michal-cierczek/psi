<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "celKP".
 *
 * @property integer $id
 * @property string $opis
 * @property integer $przedmiot_id
 *
 * @property Przedmiot $przedmiot
 */
class CelKP extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'celKP';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['opis'], 'string'],
            [['przedmiot_id'], 'required'],
            [['przedmiot_id'], 'integer']
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
