<?php

namespace app\models\search;

use Yii;
use yii\data\ActiveDataProvider;
use app\models\search\Forme;

/**
 * A general model class. Allows search on most fields.
 * Search is made only via Forme.
 */
class FormeSearch extends Forme
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['forme', 'lemme', 'primaryCategory'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Forme::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        print_r($params);
        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // Only find the first matching lemme if lemme is set, not all of them.
        if (isset($this->lemme)) {
            $query
                ->select('formes.*')
                ->from(['formes'])
                ->leftJoin(
                    ['f2' => 'formes'],
                    ['and', 'formes.lemme = f2.lemme', 'formes.forme > f2.forme',]
                )
                ->with('formes');
        }

        echo 'forme:' .     $this->forme;
        $query->andFilterWhere(['like', 'forme', $this->forme])
            ->andFilterWhere(['like', 'lemme', $this->lemme])
            ->andFilterWhere(['like', 'primaryCategory', $this->primaryCategory]);

        // Only find the first matching lemme if lemme is set, not all of them.
        if (isset($this->lemme)) {
            $query
                ->where(['f2.formeid' => null]);
        }

        return $dataProvider;
    }
}
