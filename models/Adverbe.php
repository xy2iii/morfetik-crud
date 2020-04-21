<?php

namespace app\models;

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
            [['ID', 'Lemme'], 'required'],
        ];
    }
}
