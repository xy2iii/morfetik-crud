<?php

namespace app\models\crud;

use yii\db\ActiveRecord;

class Nom extends ActiveRecord
{
    public static function tableName()
    {
        return 'nslemmes';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Lemme', 'CatGram', 'Flex'], 'required'],
            [['souscatgram', 'Dom', 'Notes', 'variante', 'infos'], 'default', 'value' => ''],
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
            'Dom' => 'Domaine',
        ];
    }
}
