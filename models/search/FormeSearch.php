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
            [['forme', 'lemme', 'catgram', 'souscatgram', 'temps', 'genre', 'num', 'person', 'variante', 'infos', 'notes'], 'safe'],
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


        $query
            ->select('lemmeid, lemme, catgram, souscatgram, cat, genre, num, person, temps, variante, infos, notes, pronominal');

        /* If an accented search is set, use a MySQL collation that does accent-sensitive search.
         * See https://stackoverflow.com/questions/500826/how-to-conduct-an-accent-sensitive-search-in-mysql.
         * Unfortunately this is not supported by Yii,so do a regexp search instead which is accent-insensitive. */
        if ($isAccentSearch) {
            if ($isStrict) {
                $query
                    ->andFilterWhere(['regexp', 'forme', '^' . $this->forme . '$'])
                    ->andFilterWhere(['regexp', 'lemme', '^' . $this->lemme . '$']);
            } else {
                $query
                    ->andFilterWhere(['regexp', 'forme', '^' . $this->forme . '(.*)$'])
                    ->andFilterWhere(['regexp', 'lemme', '^' . $this->lemme . '(.*)$']);
            }
        } else {
            if ($isStrict) {
                $query
                    ->andFilterWhere(['=', 'forme', $this->forme])
                    ->andFilterWhere(['=', 'lemme', $this->lemme]);
            } else {
                // false as the fourth param allows us to include %.
                $query
                    ->andFilterWhere(['like', 'forme', $this->forme . '%', false])
                    ->andFilterWhere(['like', 'lemme', $this->lemme . '%', false]);
            }
        }

        $query
            ->andFilterWhere(['like', 'catgram', $this->catgram])
            ->andFilterWhere(['like', 'souscatgram', $this->souscatgram])
            ->andFilterWhere(['like', 'temps', $this->temps])
            ->andFilterWhere(['like', 'num', $this->num])
            ->andFilterWhere(['like', 'genre', $this->genre])
            ->andFilterWhere(['like', 'person', $this->person])
            ->andFilterWhere(['like', 'variante', $this->variante])
            ->andFilterWhere(['like', 'infos', $this->infos])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        $query->distinct();

        return $dataProvider;
    }
}
