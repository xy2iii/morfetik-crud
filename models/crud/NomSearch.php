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
            [['ID', 'Lemme', 'CatGram', 'Flex', 'Dom', 'Grs', 'Maj', 'Lig', 'Standard', 'Notes'], 'safe'],
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
            ->andFilterWhere(['like', 'Flex', $this->Flex])
            ->andFilterWhere(['like', 'Dom', $this->Dom])
            ->andFilterWhere(['like', 'Grs', $this->Grs])
            ->andFilterWhere(['like', 'Maj', $this->Maj])
            ->andFilterWhere(['like', 'Lig', $this->Lig])
            ->andFilterWhere(['like', 'Standard', $this->Standard])
            ->andFilterWhere(['like', 'Notes', $this->Notes]);

        return $dataProvider;
    }
}
