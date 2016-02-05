<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kurs;

/**
 * KursSearch represents the model behind the search form about `app\models\Kurs`.
 */
class KursSearch extends Kurs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'CMPS', 'ZZU', 'bKECTS', 'pECTS', 'ECTS', 'czyKonczacy', 'przedmiot_id'], 'integer'],
            [['formaProwadzeniaZajec', 'formaZaliczenia'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Kurs::find()->where(['przedmiot_id'=>$params]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

       

        return $dataProvider;
    }
}
