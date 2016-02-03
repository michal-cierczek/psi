<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "literatura".
 *
 * @property integer $id
 * @property string $opis
 * @property integer $czyPodstawowa
 * @property integer $przedmiot_id
 *
 * @property Przedmiot $przedmiot
 */
class Literatura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'literatura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['podstawowa', 'uzupelniajaca'], 'string'],
            [['przedmiot_id'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'podstawowa' => 'Literatura podstawowa',
            'uzupelniajaca' => 'Literatura uzupelniajaca',
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
