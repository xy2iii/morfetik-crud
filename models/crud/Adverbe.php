<?php

namespace app\models\crud;

use yii\db\ActiveRecord;

class Adverbe extends ActiveRecord
{
    public static function tableName()
    {
        return 'adv';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Lemme'], 'required'],
            [['souscatgram', 'variante', 'infos', 'Notes'], 'default', 'value' => ''],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'souscatgram' => 'Sous-catégorie grammaticale',
            'infos' => 'Information sémantique'
        ];
    }
}
