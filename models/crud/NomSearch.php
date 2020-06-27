<?php

namespace app\models\crud;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\crud\Nom;

/**
 * NomSearch represents the model behind the search form about `app\models\Nom`.
 */
class NomSearch extends Nom
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'Lemme', 'CatGram', 'souscatgram', 'Flex', 'Dom', 'Notes', 'variante', 'infos'], 'safe'],
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
        $query = Nom::find();

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
            ->andFilterWhere(['like', 'CatGram', $this->CatGram])
            ->andFilterWhere(['like', 'souscatgram', $this->souscatgram])
            ->andFilterWhere(['like', 'Flex', $this->Flex])
            ->andFilterWhere(['like', 'Dom', $this->Dom])
            ->andFilterWhere(['like', 'Notes', $this->Notes])
            ->andFilterWhere(['like', 'variante', $this->variante])
            ->andFilterWhere(['like', 'infos', $this->infos]);

        return $dataProvider;
    }
}
