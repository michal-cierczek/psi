<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kierunek;

/**
 * KierunekSearch represents the model behind the search form about `app\models\Kierunek`.
 */
class KierunekSearch extends Kierunek
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'stopien'], 'integer'],
            [['opis', 'skrot', 'cykl'], 'safe'],
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
        $query = Kierunek::find();

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
            'stopien' => $this->stopien,
        ]);

        $query->andFilterWhere(['like', 'opis', $this->opis])
            ->andFilterWhere(['like', 'skrot', $this->skrot])
        	->andFilterWhere(['like', 'cykl', $this->cykl]);

        return $dataProvider;
    }
}
