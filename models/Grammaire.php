<?php

namespace app\models;

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
            [['ID', 'Lemme', 'Forme', 'CatGram',], 'required'],
            [['Gender', 'Number', 'Person', 'Notes'], 'default', 'value' => ''],
        ];
    }
}
