<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kek;

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
        $query = Kek::find()->where(['kierunekStudiow_id'=>$params]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        return $dataProvider;
    }
}
