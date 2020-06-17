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
 * @property string $notes
 * @property string $infos
 * @property string $pronominal
 */
class Forme extends ActiveRecord
{
    /**
     * Human-readable labels for primary categories.
     * Returns an array with two fields:
     * - label: the label for the given field.
     * - isLocution: whether the current category is a locution or not.
     */
    private static $categoryToLabel = [
        '' => '',
        // Adjectifs
        'adj' => ['Adjectif', false],
        'adjm' => ['Adjectif', false],
        'adjf' => ['Adjectif', false],
        'adj(m)' => ['Adjectif', false],
        'adj(f)' => ['Adjectif', false],
        'adjms' => ['Adjectif', false],
        'adjfs' => ['Adjectif', false],
        'adjmp' => ['Adjectif', false],
        'adjfp' => ['Adjectif', false],
        'adjord' => ['Adjectif', false],
        // Adjectif-locution
        'loc adj' => ['Adjectif', true],
        // Adverbes
        'adv' => ['Adverbe', false],
        'Adv' => ['Adverbe', false],
        // Adverbe-locution
        'loc adv' => ['Adverbe', true],
        // Grammaire: déterminants
        'D' => ['Déterminant', false],
        'D:Déf' => ['Déterminant', false],
        'D:Dém' => ['Déterminant', false],
        'D:Ind' => ['Déterminant', false],
        'D:Int' => ['Déterminant', false],
        'D:Excl' => ['Déterminant', false],
        'D:Num' => ['Déterminant', false],
        'D:Part' => ['Déterminant', false],
        'D:Poss' => ['Déterminant', false],
        'D:Rel' => ['Déterminant', false],
        // Locution (déterminant)
        'loc D' => ['Déterminant', true],
        // Pronoms
        'P' => ['Pronom', false],
        'P:Dém' => ['Pronom', false],
        'P:Ddém' => ['Pronom', false],
        'P:Ind' => ['Pronom', false],
        'P:Int' => ['Pronom', false],
        'P:Pers' => ['Pronom', false],
        'P:Poss' => ['Pronom', false],
        'P:Rel' => ['Pronom', false],
        // Locution (pronom)
        'loc P' => ['Pronom', true],
        // Conjonctions
        'C:Coord' => ['Conjonction', false],
        'C:Sub' => ['Conjonction', false],
        // Locution (conjonction)
        'loc C' => ['Conjonction', true],
        // Interjection
        'Interj' => ['Interjection', false],
        // Locution (interjection)
        'loc Interj' => ['Interjection', true],
        // Préposition
        'Prép' => ['Préposition', false],
        // Locution (préposition)
        'loc Prép' => ['Préposition', true],
        // Locution (phrase)
        'loc' => ['Locution', true],
        'loc Ph' => ['Locution', true],
        // Sigle
        'sig' => ['Sigle', false],
        // Noms
        'nm' => ['Nom', false],
        'nms' => ['Nom', false],
        'nmp' => ['Nom', false],
        'nf' => ['Nom', false],
        'nfs' => ['Nom', false],
        'nfp' => ['Nom', false],
        'np' => ['Nom', false],
        // Locution (nom)
        'loc n' => ['Nom', true],
        // Verbes
        'Verbe' => ['Verbe', false],
        'vrb' => ['Verbe', false],
        'vi' => ['Verbe', false],
        'vt' => ['Verbe', false],
        'vt (vpr)' => ['Verbe', false],
        // Locution (verbe)
        'loc v' => ['Verbe', true],
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
    public function getCatgram()
    {
        return static::categoryToLabel($this->catgram)[0];
    }

    /**
     * Returns whether the current Forme is a "locution"
     * or not. This is determined by the second field in the array.
     * @return bool Whether the current Forme is a locution or not.
     * XXX: change label
     */
    public function isLocution()
    {
        return static::categoryToLabel($this->catgram)[1];
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
            'catgram' => 'Catégorie',
            'souscatgram' => 'Sous-catégorie',
            'genre' => 'Genre',
            'num' => 'Nombre',
            'person' => 'Personne',
            'temps' => 'Temps',
            'notes' => 'Notes',
            'infos' => 'Infos',
            'pronominal' => 'Pronominal',
        ];
    }
}
