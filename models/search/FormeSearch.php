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

        // Parameters relative to the search, set in the controller.
        $isAccentSearch = boolval($params['searchParams']['accent']);
        $isStrict = boolval($params['searchParams']['strict']);

        if (!$this->validate()) {
            return $dataProvider;
        }


        $query->select('lemmeid, lemme, catgram, cat, genre, num, person, temps, rare, lig, graphsav, notes, infos, prono');

        /* If an accented search is set, use a MySQL collation that does accent-sensitive search.
         * See https://stackoverflow.com/questions/500826/how-to-conduct-an-accent-sensitive-search-in-mysql.
         * Unfortunately this is not supported by Yii,so do a regexp search instead which is accent-insensitive. */
        if ($isAccentSearch) {
            if ($isStrict) {
                $query
                    ->andFilterWhere(['regexp', 'forme', '^' . $this->forme . '$']);
            } else {
                $query
                    ->andFilterWhere(['regexp', 'forme', '^' . $this->forme . '(.*)$']);
            }
        } else {
            if ($isStrict) {
                $query
                    ->andFilterWhere(['=', 'forme', $this->forme]);
            } else {
                // false as the fourth param allows us to include %.
                $query
                    ->andFilterWhere(['like', 'forme', $this->forme . '%', false]);
            }
        }

        // Like queries.
        $query
            ->andFilterWhere(['like', 'catgram', $this->catgram])
            ->andFilterWhere(['like', 'temps', $this->temps])
            ->andFilterWhere(['like', 'num', $this->num])
            ->andFilterWhere(['like', 'genre', $this->genre])
            ->andFilterWhere(['like', 'person', $this->person]);

        // Only get the different rows, to avoid DB duplicates.
        $query->distinct();

        return $dataProvider;
    }
}
