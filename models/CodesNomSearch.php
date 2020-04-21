<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CodesNom;

/**
 * CodesNomSearch represents the model behind the search form about `app\models\CodesNom`.
 */
class CodesNomSearch extends CodesNom
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Code', 'Rad', 'S', 'P'], 'safe'],
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
        $query = CodesNom::find();

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
            ->andFilterWhere(['like', 'S', $this->S])
            ->andFilterWhere(['like', 'P', $this->P]);

        return $dataProvider;
    }
}
