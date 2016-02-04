<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ocenaOsiagnieciaPek".
 *
 * @property integer $idocenaOsiagnieciaPek
 * @property string $symbol
 * @property string $opis
 *
 * @property OcenaOsiagnieciaPekpek[] $ocenaOsiagnieciaPekpeks
 * @property Pek[] $peks
 */
class Ocena extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ocenaOsiagnieciaPek';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['symbol', 'opis'], 'required'],
            [['opis'], 'string'],
            [['symbol'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idocenaOsiagnieciaPek' => 'Idocena Osiagniecia Pek',
            'symbol' => 'Symbol',
            'opis' => 'Opis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOcenaOsiagnieciaPekpeks()
    {
        return $this->hasMany(OcenaOsiagnieciaPekpek::className(), ['ocenaOsiagnieciaPek_id' => 'idocenaOsiagnieciaPek']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeks()
    {
        return $this->hasMany(Pek::className(), ['id' => 'pek_id'])->viaTable('ocenaOsiagnieciaPekpek', ['ocenaOsiagnieciaPek_id' => 'idocenaOsiagnieciaPek']);
    }
}
