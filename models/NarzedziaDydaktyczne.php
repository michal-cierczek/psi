<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "narzedziaDydaktyczne".
 *
 * @property integer $id
 * @property string $symbol
 * @property string $opis
 * @property integer $przedmiot_id
 *
 * @property Przedmiot $przedmiot
 */
class NarzedziaDydaktyczne extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'narzedziaDydaktyczne';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['symbol', 'opis', 'przedmiot_id'], 'required',
            		'message' => 'To pole nie może być puste.'
            ],
            [['opis'], 'string'],
            [['przedmiot_id'], 'integer'],
            [['symbol'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'symbol' => 'Symbol',
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
