<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CodesVerbe;

/**
 * CodesVerbeSearch represents the model behind the search form about `app\models\CodesVerbe`.
 */
class CodesVerbeSearch extends CodesVerbe
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Code', 'Modele', 'Rmodele', 'Inf', 'Indpr1S', 'Indpr2S', 'Indpr3S', 'Indpr1P', 'Indpr2P', 'Indpr3P', 'Indimp1S', 'Indimp2S', 'Indimp3S', 'Indimp1P', 'Indimp2P', 'Indimp3P', 'Indps1S', 'Indps2S', 'Indps3S', 'Indps1P', 'Indps2P', 'Indps3P', 'Indfut1S', 'Indfut2S', 'Indfut3S', 'Indfut1P', 'Indfut2P', 'Indfut3P', 'Condpr1S', 'Condpr2S', 'Condpr3S', 'Condpr1P', 'Condpr2P', 'Condpr3P', 'Subpr1S', 'Subpr2S', 'Subpr3S', 'Subpr1P', 'Subpr2P', 'Subpr3P', 'Subimp1S', 'Subimp2S', 'Subimp3S', 'Subimp1P', 'Subimp2P', 'Subimp3P', 'Imppr2S', 'Imppr1P', 'Imppr2P', 'Ppres', 'PpSM', 'PpSF', 'PpPM', 'PpPF'], 'safe'],
            [['Rad'], 'integer'],
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
        $query = CodesVerbe::find();

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
            'Rad' => $this->Rad,
        ]);

        $query->andFilterWhere(['like', 'Code', $this->Code])
            ->andFilterWhere(['like', 'Modele', $this->Modele])
            ->andFilterWhere(['like', 'Rmodele', $this->Rmodele])
            ->andFilterWhere(['like', 'Inf', $this->Inf])
            ->andFilterWhere(['like', 'Indpr1S', $this->Indpr1S])
            ->andFilterWhere(['like', 'Indpr2S', $this->Indpr2S])
            ->andFilterWhere(['like', 'Indpr3S', $this->Indpr3S])
            ->andFilterWhere(['like', 'Indpr1P', $this->Indpr1P])
            ->andFilterWhere(['like', 'Indpr2P', $this->Indpr2P])
            ->andFilterWhere(['like', 'Indpr3P', $this->Indpr3P])
            ->andFilterWhere(['like', 'Indimp1S', $this->Indimp1S])
            ->andFilterWhere(['like', 'Indimp2S', $this->Indimp2S])
            ->andFilterWhere(['like', 'Indimp3S', $this->Indimp3S])
            ->andFilterWhere(['like', 'Indimp1P', $this->Indimp1P])
            ->andFilterWhere(['like', 'Indimp2P', $this->Indimp2P])
            ->andFilterWhere(['like', 'Indimp3P', $this->Indimp3P])
            ->andFilterWhere(['like', 'Indps1S', $this->Indps1S])
            ->andFilterWhere(['like', 'Indps2S', $this->Indps2S])
            ->andFilterWhere(['like', 'Indps3S', $this->Indps3S])
            ->andFilterWhere(['like', 'Indps1P', $this->Indps1P])
            ->andFilterWhere(['like', 'Indps2P', $this->Indps2P])
            ->andFilterWhere(['like', 'Indps3P', $this->Indps3P])
            ->andFilterWhere(['like', 'Indfut1S', $this->Indfut1S])
            ->andFilterWhere(['like', 'Indfut2S', $this->Indfut2S])
            ->andFilterWhere(['like', 'Indfut3S', $this->Indfut3S])
            ->andFilterWhere(['like', 'Indfut1P', $this->Indfut1P])
            ->andFilterWhere(['like', 'Indfut2P', $this->Indfut2P])
            ->andFilterWhere(['like', 'Indfut3P', $this->Indfut3P])
            ->andFilterWhere(['like', 'Condpr1S', $this->Condpr1S])
            ->andFilterWhere(['like', 'Condpr2S', $this->Condpr2S])
            ->andFilterWhere(['like', 'Condpr3S', $this->Condpr3S])
            ->andFilterWhere(['like', 'Condpr1P', $this->Condpr1P])
            ->andFilterWhere(['like', 'Condpr2P', $this->Condpr2P])
            ->andFilterWhere(['like', 'Condpr3P', $this->Condpr3P])
            ->andFilterWhere(['like', 'Subpr1S', $this->Subpr1S])
            ->andFilterWhere(['like', 'Subpr2S', $this->Subpr2S])
            ->andFilterWhere(['like', 'Subpr3S', $this->Subpr3S])
            ->andFilterWhere(['like', 'Subpr1P', $this->Subpr1P])
            ->andFilterWhere(['like', 'Subpr2P', $this->Subpr2P])
            ->andFilterWhere(['like', 'Subpr3P', $this->Subpr3P])
            ->andFilterWhere(['like', 'Subimp1S', $this->Subimp1S])
            ->andFilterWhere(['like', 'Subimp2S', $this->Subimp2S])
            ->andFilterWhere(['like', 'Subimp3S', $this->Subimp3S])
            ->andFilterWhere(['like', 'Subimp1P', $this->Subimp1P])
            ->andFilterWhere(['like', 'Subimp2P', $this->Subimp2P])
            ->andFilterWhere(['like', 'Subimp3P', $this->Subimp3P])
            ->andFilterWhere(['like', 'Imppr2S', $this->Imppr2S])
            ->andFilterWhere(['like', 'Imppr1P', $this->Imppr1P])
            ->andFilterWhere(['like', 'Imppr2P', $this->Imppr2P])
            ->andFilterWhere(['like', 'Ppres', $this->Ppres])
            ->andFilterWhere(['like', 'PpSM', $this->PpSM])
            ->andFilterWhere(['like', 'PpSF', $this->PpSF])
            ->andFilterWhere(['like', 'PpPM', $this->PpPM])
            ->andFilterWhere(['like', 'PpPF', $this->PpPF]);

        return $dataProvider;
    }
}
