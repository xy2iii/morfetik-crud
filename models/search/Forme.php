<?php

namespace app\models\search;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;

/**
 * Each Forme is described here by both primary and secondary category.
 * Its secondary category is the catgram field. 
 * Use the $primaryCategoryLabel attribute to get a human-readable name.
 * @property string $primaryCategory
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
 * @property string $pronominal
 */
class Forme extends ActiveRecord
{
    // The primary category of each form.
    private $primaryCategory;

    private static $catgramToCategory = [
        '' => '',
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
        'P:Dém' => 'pronom',
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
        'loc' => 'loc-loc',
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
        '' => '',
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
    public static function categoryToLabel($cat)
    {
        return static::$categoryToLabel[$cat];
    }

    /**
     * Returns a mapping between categories as stored in the catgram field of the DB
     * and table categories like 'adj', 'verbe', 'nom'.
     * This is used to get the "primary" category of any given lemma.
     * @return string The given category.
     */
    public function getPrimaryCategory()
    {
        return isset($primaryCategory)
            ? $primaryCategory
            : static::$catgramToCategory[$this->catgram];
    }
    public function setPrimaryCategory($cat)
    {
        $primaryCategory = $cat;
    }

    /**
     * Returns whether the current Forme is a "locution"
     * or not. This is determined by the category name.
     * If it ends with "loc", then the category is a locution.
     * @return bool Whether the current Forme is a locution or not.
     */
    public function isLocution()
    {
        return substr($this->primaryCategory, -3) === 'loc';
    }

    // Exception table.
    private static $hMuetTable = [
        "hâbler",
        "hacher",
        "hachurer",
        "haïr",
        "hâler",
        "haler",
        "halkiner",
        "haleter",
        "hancher",
        "handicaper",
        "hannetonner",
        "hanter",
        "happer",
        "haranguer",
        "harasser",
        "harceler",
        "harder",
        "haricoter",
        "harnacher",
        "harpailler",
        "harper",
        "harponner",
        "hasarder",
        "hâter",
        "haubaner",
        "haubanner",
        "hausser",
        "haver",
        "havir",
        "héler",
        "hennir",
        "hercher",
        "hérisser",
        "hérissonner",
        "herscher",
        "herscher",
        "herser",
        "heurter",
        "hiérarchiser",
        "highlifer",
        "hisser",
        "hocher",
        "hogner",
        "hôler",
        "hollandiser",
        "hongrer",
        "hongroyer",
        "honnir",
        "hoqueter",
        "hotter",
        "houblonner",
        "houer",
        "houpper",
        "hourder",
        "hourdir",
        "houspiller",
        "housser",
        "hucher",
        "huer",
        "huir",
        "hululer",
        "humer",
        "humoter",
        "hurler",
        "hutter",
    ];

    /**
     * Returns whether the Lemme itself is an elision.
     * For example, aimer is an elision, because it can be said
     * as "j'aime".
     * @param string The lemme, as a string.
     * @return bool Whether the passed Lemme is an elision or not.
     */
    public static function isElision($lemme)
    {
        // Check if the first letter is a voyelle
        $firstChar = mb_substr($lemme, 0, 1);
        $voyelles = ['a', 'e', 'i', 'o', 'u'];

        if (in_array($firstChar, $voyelles)) {
            return true;
        }

        // Check if it has an "h muet (h aspiré)". 
        // It must NOT be in this table to have an elision.
        if ($firstChar === 'h') {
            return !in_array($lemme, static::$hMuetTable);
        } else {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'formes';
    }
    /**
     * Since we're looking for different lemmes within the formes,
     * the primary key here is the lemmeid.
     */
    public static function primaryKey()
    {
        return ["lemmeid"];
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
            'primaryCategory' => 'Catégorie',
            'catgram' => 'Sous-catégorie',
            'cat' => 'Catégorie',
            'genre' => 'Genre',
            'num' => 'Nombre',
            'person' => 'Personne',
            'temps' => 'Temps',
            'rare' => 'Rare',
            'lig' => 'Ligature',
            'graphsav' => 'Graphie savante',
            'notes' => 'Notes',
            'infos' => 'Infos',
            'pronominal' => 'Pronominal',
        ];
    }
}
