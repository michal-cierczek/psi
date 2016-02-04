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
        $query = Kurs::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'CMPS' => $this->CMPS,
            'ZZU' => $this->ZZU,
            'bKECTS' => $this->bKECTS,
            'pECTS' => $this->pECTS,
            'ECTS' => $this->ECTS,
            'czyKonczacy' => $this->czyKonczacy,
            'przedmiot_id' => $this->przedmiot_id,
        ]);

        $query->andFilterWhere(['like', 'formaProwadzeniaZajec', $this->formaProwadzeniaZajec])
            ->andFilterWhere(['like', 'formaZaliczenia', $this->formaZaliczenia]);

        return $dataProvider;
    }
}
