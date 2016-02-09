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
            [['id', 'published', 'user_id'], 'integer'],
            [['kodKursu', 'wymaganie', 'nazwaPolska', 'nazwaAngielska', 'kierunekStudiow_id'], 'safe'],
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
    	if(Yii::$app->user->isGuest){
    		$query = Przedmiot::find()->where(['published'=>1]);}
    	elseif(Yii::$app->user->identity->groupId=='admin'){
       		$query = Przedmiot::find();}
        elseif(Yii::$app->user->identity->groupId=='author'){
        	$query = Przedmiot::find()->where(['user_id'=>Yii::$app->user->identity->id]);}
        
        

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        
        $query->joinWith('kierunekStudiow');
        
        
        $query->andFilterWhere([
            'id' => $this->id,
            'kierunekStudiow_id' => $this->kierunekStudiow_id,
            'published' => $this->published,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'kodKursu', $this->kodKursu])
            ->andFilterWhere(['like', 'wymaganie', $this->wymaganie])
            ->andFilterWhere(['like', 'nazwaPolska', $this->nazwaPolska])
            ->andFilterWhere(['like', 'nazwaAngielska', $this->nazwaAngielska])
            ->andFilterWhere(['like', 'kierunekStudiow.opis', $this->kierunekStudiow_id])
            ->andFilterWhere(['like', 'kierunekStudiow.cykl', $this->kierunekStudiow_id]);

        return $dataProvider;
    }
}
