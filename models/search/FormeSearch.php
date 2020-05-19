<?php

namespace app\models\search;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
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
            [['forme', 'lemme', 'catgram', 'temps', 'genre', 'num', 'person'], 'safe'],
        ];
    }

    /**
     * Search with given parameters.
     * In 'searchParams' of the $params array, is stored various extra information
     * about how the search is to be performed.
     */
    public function search($params)
    {
        $query = Forme::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //print_r($params);
        $this->load($params);
        /* Whether the search is accented or not. This is set via searchParams
         * in the controller. 
         */
        $isAccentSearch = boolval($params['searchParams']['accent']);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // Only find the first matching lemme if lemme is set, not all of them.
        /*
        if (isset($this->lemme)) {
            $query
                ->select('formes.*')
                ->from(['formes'])
                ->leftJoin(
                    ['f2' => 'formes'],
                    ['and', 'formes.lemme = f2.lemme', 'formes.forme > f2.forme',]
                )
                ->with('formes');
        }*/

        $query
            ->andFilterWhere(['like', 'catgram', $this->catgram])
            ->andFilterWhere(['like', 'temps', $this->temps])
            ->andFilterWhere(['like', 'num', $this->num])
            ->andFilterWhere(['like', 'genre', $this->genre])
            ->andFilterWhere(['like', 'person', $this->person]);

        /* TODO: If an accented search is set, use a MySQL collation that does accent-sensitive 
         * search.
         * Our queries have a utf8mb4 character set, so our desired collation that's
         * accent-sensitive is utf8mb4_bin.
         * See https://stackoverflow.com/questions/500826/how-to-conduct-an-accent-sensitive-search-in-mysql.
         * Unfortunately this is not supported by Yii,
         * so do a regexp search instead which is accent-insensitive.
         */
        if ($isAccentSearch) {
            // Match everything after.  
            $query
                ->andFilterWhere(['regexp', 'lemme', '^' . $this->lemme . '(.*)$'])
                ->andFilterWhere(['regexp', 'forme', '^' . $this->forme . '(.*)$']);
        } else {
            $query
                ->andFilterWhere(['like', 'lemme', $this->lemme . '%', false])
                ->andFilterWhere(['like', 'forme', $this->forme . '%', false]);
        }

        // Only find the first matching lemme if lemme is set, not all of them.
        /*
        if (isset($this->lemme)) {
            $query
                ->where(['f2.formeid' => null]);
        }*/

        return $dataProvider;
    }
}
