<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kek;
use app\models\Przedmiot;

/**
 * KekSearch represents the model behind the search form about `app\models\Kek`.
 */
class KekSearch extends Kek
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kierunekStudiow_id', 'kategoria'], 'integer'],
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
    	if(Yii::$app->controller->id=='kierunek')
        $query = Kek::find()->where(['kierunekStudiow_id'=>$params['kierunekStudiow']]);
    	elseif (Yii::$app->controller->id=='przedmiot'){
    		//$query = Przedmiot::find($params['kierunekStudiow'])->one()->getKeks();
    		$query = Kek::findBySql('SELECT * FROM kek WHERE id IN (SELECT kek_id FROM przedmiotKek WHERE przedmiot_id =' . $params['przedmiotId'] . ')');
    	}
    	Yii::trace('query');
    	Yii::trace($query);	
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
        		'id' => $this->id, 'kierunekStudiow_id' => $this->kierunekStudiow_id,
        		'kategoria' => $this->kategoria,
        ]);
        
        $query->andFilterWhere(['like', 'opis', $this->opis])
        ->andFilterWhere(['like', 'symbol', $this->symbol]);
        
        return $dataProvider;
    }
}
