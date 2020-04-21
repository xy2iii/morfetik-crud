<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CodesAdjectif;

/**
 * CodesAdjectifSearch represents the model behind the search form about `app\models\CodesAdjectif`.
 */
class CodesAdjectifSearch extends CodesAdjectif
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Code', 'Rad', 'MS', 'MP', 'FS', 'FP'], 'safe'],
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
        $query = CodesAdjectif::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'Code', $this->Code])
            ->andFilterWhere(['like', 'Rad', $this->Rad])
            ->andFilterWhere(['like', 'MS', $this->MS])
            ->andFilterWhere(['like', 'MP', $this->MP])
            ->andFilterWhere(['like', 'FS', $this->FS])
            ->andFilterWhere(['like', 'FP', $this->FP]);

        return $dataProvider;
    }
}
