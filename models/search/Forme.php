<?php

namespace app\models\search;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * Each Forme is described here by both primary and secondary category.
 * Its secondary category is the catgram field. 
 * Use the $primaryCategoryLabel attribute to get a human-readable name.
 * @property string $primaryCategory
 * @property string $primaryCategoryLabel
 * @property string $formeid 
 * @property string $forme
 * @property string $lemmeid
 * @property string $lemme
 * @property string $catgram
 * @property string $cat
 * @property string $genre
 * @property string $num
 * @property string $person
 * @property string $temps
 * @property string $rare
 * @property string $lig
 * @property string $graphsav
 * @property string $notes
 * @property string $infos
 * @property string $prono
 */
class Forme extends \yii\db\ActiveRecord
{
    private static $catgramToCategory = [
        // Adjectifs
        'adj' => 'adj',
        'adjm' => 'adj',
        'adjf' => 'adj',
        'adj(m)' => 'adj',
        'adj(f)' => 'adj',
        'adjms' => 'adj',
        'adjfs' => 'adj',
        'adjmp' => 'adj',
        'adjfp' => 'adj',
        'adjord' => 'adj',
        // Adjectif-locution
        'loc adj' => 'adj-loc',
        // Adverbes
        'adv' => 'adv',
        'Adv' => 'adv',
        // Adverbe-locution
        'loc adv' => 'adv-loc',
        // Grammaire: déterminants
        'D' => 'det',
        'D:Déf' => 'det',
        'D:Dém' => 'det',
        'D:Ind' => 'det',
        'D:Int' => 'det',
        'D:Excl' => 'det',
        'D:Num' => 'det',
        'D:Part' => 'det',
        'D:Poss' => 'det',
        'D:Rel' => 'det',
        // Locution (déterminant)
        'loc D' => 'det-loc',
        // Pronoms
        'P' => 'pronom',
        'P:Ddém' => 'pronom',
        'P:Ind' => 'pronom',
        'P:Int' => 'pronom',
        'P:Pers' => 'pronom',
        'P:Poss' => 'pronom',
        'P:Rel' => 'pronom',
        // Locution (pronom)
        'loc P' => 'pronom-loc',
        // Conjonctions
        'C:Coord' => 'conj',
        'C:Sub' => 'conj',
        // Locution (conjonction)
        'loc C' => 'conj-loc',
        // Interjection
        'Interj' => 'interj',
        // Locution (interjection)
        'loc Interj' => 'interj-loc',
        // Préposition
        'Prép' => 'prep',
        // Locution (préposition)
        'loc Prép' => 'prep-loc',
        // Locution (phrase)
        'loc' => 'phrase-loc',
        'loc Ph' => 'phrase-loc',
        // Sigle
        'sig' => 'sigle',
        // Noms
        'nm' => 'nom',
        'nms' => 'nom',
        'nmp' => 'nom',
        'nf' => 'nom',
        'nfs' => 'nom',
        'nfp' => 'nom',
        'np' => 'nom',
        // Locution (nom)
        'loc n' => 'nom-loc',
        // Verbes
        'Verbe' => 'verbe',
        'vrb' => 'verbe',
        'vi' => 'verbe',
        'vt' => 'verbe',
        'vt (vpr)' => 'verbe',
        // Locution (verbe)
        'loc v' => 'verbe-loc',
    ];
    /**
     * Human-readable labels for primary categories.
     * Returns an array with two fields:
     * - label: the label for the given field.
     * - isLocution: whether the current category is a locution or not.
     */
    private static $categoryToLabel = [
        'adj' => 'Adjectif',
        'adv' => 'Adverbe',
        'det' => 'Déterminant',
        'pronom' => 'Déterminant',
        'conj' => 'Conjonction',
        'interj' => 'Interjection',
        'prep' => 'Préposition',
        'sig' => 'Sigle',
        'nom' => 'Nom',
        'verbe' => 'Verbe',
        // Locutions
        'adj-loc' => 'Adjectif',
        'adv-loc' => 'Adverbe',
        'det-loc' => 'Déterminant',
        'pronom-loc' => 'Déterminant',
        'conj-loc' => 'Conjonction',
        'interj-loc' => 'Interjection',
        'prep-loc' => 'Préposition',
        'phrase-loc' => 'Phrase',
        'nom-loc' => 'Nom',
        'verbe-loc' => 'Verbe',
    ];
    /**
     * Returns a mapping between categories as stored in the catgram field of the DB
     * and table categories like 'adj', 'verbe', 'nom'.
     * This is used to get the "primary" category of any given lemma.
     * @return string The given category.
     */
    public function getPrimaryCategory()
    {
        return static::$catgramToCategory[$this->catgram];
    }
    /**
     * Returns the label for the primary category.
     * @return string A label for the current category.
     */
    public function getPrimaryCategoryLabel()
    {
        return static::$categoryToLabel[$this->primaryCategory];
    }
    /**
     * Returns whether the current Forme is a "conjonction"
     * or not. This is determined by the category name.
     * If it ends with "loc", then the category is a locution.
     * @return bool Whether the current Forme is a conjonction or not.
     */
    public function isConjonction()
    {
        return static::$categoryToLabel[$this->primaryCategory];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'formes';
    }
    public static function primaryKey()
    {
        return ["formeid"];
    }
    /** The form that looks for an Forme is the SearchBarForm. */
    public function formName()
    {
        return 'SearchBarForm';
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'formeid' => 'Formeid',
            'forme' => 'Forme',
            'lemmeid' => 'Lemmeid',
            'lemme' => 'Lemme',
            'primaryCategoryLabel' => 'Catégorie',
            'catgram' => 'Catgram',
            'cat' => 'Cat',
            'genre' => 'Genre',
            'num' => 'Num',
            'person' => 'Person',
            'temps' => 'Temps',
            'rare' => 'Rare',
            'lig' => 'Lig',
            'graphsav' => 'Graphsav',
            'notes' => 'Notes',
            'infos' => 'Infos',
            'prono' => 'Prono',
        ];
    }
}
