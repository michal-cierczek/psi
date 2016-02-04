<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NarzedziaDydaktyczne;

/**
 * NarzedziaDydaktyczneSearch represents the model behind the search form about `app\models\NarzedziaDydaktyczne`.
 */
class NarzedziaDydaktyczneSearch extends NarzedziaDydaktyczne
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idnarzedziaDydaktyczne', 'przedmiot_id'], 'integer'],
            [['symbol', 'opis'], 'safe'],
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
        $query = NarzedziaDydaktyczne::find();

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
            'idnarzedziaDydaktyczne' => $this->idnarzedziaDydaktyczne,
            'przedmiot_id' => $this->przedmiot_id,
        ]);

        $query->andFilterWhere(['like', 'symbol', $this->symbol])
            ->andFilterWhere(['like', 'opis', $this->opis]);

        return $dataProvider;
    }
}
