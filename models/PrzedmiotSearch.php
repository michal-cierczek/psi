<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Przedmiot;

/**
 * PrzedmiotSearch represents the model behind the search form about `app\models\Przedmiot`.
 */
class PrzedmiotSearch extends Przedmiot
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kierunekStudiow_id', 'published', 'user_id'], 'integer'],
            [['kodKursu', 'wymaganie', 'nazwaPolska', 'nazwaAngielska'], 'safe'],
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
        $query = Przedmiot::find();

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
            'kierunekStudiow_id' => $this->kierunekStudiow_id,
            'published' => $this->published,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'kodKursu', $this->kodKursu])
            ->andFilterWhere(['like', 'wymaganie', $this->wymaganie])
            ->andFilterWhere(['like', 'nazwaPolska', $this->nazwaPolska])
            ->andFilterWhere(['like', 'nazwaAngielska', $this->nazwaAngielska]);

        return $dataProvider;
    }
}
