<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ocena;

/**
 * OcenaSearch represents the model behind the search form about `app\models\Ocena`.
 */
class OcenaSearch extends Ocena
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idocenaOsiagnieciaPek'], 'integer'],
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
        $query = Ocena::find();

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
            'idocenaOsiagnieciaPek' => $this->idocenaOsiagnieciaPek,
        ]);

        $query->andFilterWhere(['like', 'symbol', $this->symbol])
            ->andFilterWhere(['like', 'opis', $this->opis]);

        return $dataProvider;
    }
}
