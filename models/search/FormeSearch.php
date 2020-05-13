<?php

namespace app\models\search;

use Yii;
use yii\data\ActiveDataProvider;
use app\models\search\Forme;

/**
 * A search class for Formes.
 */
class FormeSearch extends Forme
{
    public function search($params)
    {
        $query = Forme::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, 'SearchBarForm');

        if (!$this->validate()) {
            return $dataProvider;
        }
        // false argument: Add the percent signs ourselves.
        // Complete at the end.
        $query->andFilterWhere(['like', 'forme', '' . $params->forme . '%', false]);

        return $dataProvider;
    }
}
