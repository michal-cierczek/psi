<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cykl".
 *
 * @property integer $id
 * @property string $data
 *
 * @property KierunekStudiow[] $kierunekStudiows
 */
class Cykl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cykl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data'], 'required'],
            [['data'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data' => 'Data',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKierunekStudiows()
    {
        return $this->hasMany(KierunekStudiow::className(), ['cykl_id' => 'id']);
    }
}
