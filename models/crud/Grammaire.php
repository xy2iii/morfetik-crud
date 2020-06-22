<?php

namespace app\models\crud;

use yii\db\ActiveRecord;

class Grammaire extends ActiveRecord
{
    public static function tableName()
    {
        return 'gram';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Lemme', 'Forme', 'CatGram',], 'required'],
            [['souscatgram', 'Gender', 'Number', 'Person', 'variante', 'infos', 'Notes'], 'default', 'value' => ''],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CatGram' => 'Catégorie grammaticale',
            'souscatgram' => 'Sous-catégorie grammaticale',
            'Gender' => 'Genre',
            'Number' => 'Nombre',
            'Person' => 'Personne',
            'infos' => 'Information sémantique'
        ];
    }
}
