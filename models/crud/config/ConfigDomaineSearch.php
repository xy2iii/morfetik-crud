<?php

namespace app\models\crud\config;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\crud\config\ConfigDomaine;

/**
 * AdjectifSearch represents the model behind the search form about `app\models\Adjectif`.
 */
class ConfigDomaineSearch extends ConfigDomaine
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'option', 'description'], 'safe'],
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
        $query = ConfigDomaine::find();

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
            ->andFilterWhere(['like', 'option', $this->option])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
