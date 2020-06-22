<?php

namespace app\models\crud;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\crud\Adverbe;

/**
 * AdverbeSearch represents the model behind the search form about `app\models\Adverbe`.
 */
class AdverbeSearch extends Adverbe
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'Lemme', 'souscatgram', 'variante', 'infos', 'Notes'], 'safe'],
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
        $query = Adverbe::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'ID', $this->ID])
            ->andFilterWhere(['like', 'Lemme', $this->Lemme])
            ->andFilterWhere(['like', 'souscatgram', $this->souscatgram])
            ->andFilterWhere(['like', 'variante', $this->variante])
            ->andFilterWhere(['like', 'infos', $this->infos])
            ->andFilterWhere(['like', 'Notes', $this->Notes]);

        return $dataProvider;
    }
}
