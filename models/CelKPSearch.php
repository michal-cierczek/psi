<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CelKP;

/**
 * CelKPSearch represents the model behind the search form about `app\models\CelKP`.
 */
class CelKPSearch extends CelKP
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'przedmiot_id'], 'integer'],
            [['opis', 'symbol'], 'safe'],
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
        $query = CelKP::find()->where(['przedmiot_id'=>$params]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        

        return $dataProvider;
    }
}
