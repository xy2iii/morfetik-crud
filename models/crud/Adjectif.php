<?php

namespace app\models\crud;

use yii\db\ActiveRecord;

class Adjectif extends ActiveRecord
{
    public static function tableName()
    {
        return 'alemmes';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Lemme', 'CatGram', 'Flex',], 'required'],
            [['souscatgram'], 'default', 'value' => ''],
            [['Notes'], 'default']
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
        ];
    }
}
