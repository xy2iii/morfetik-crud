<?php

namespace app\models;

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
            [['ID', 'Lemme', 'CatGram', 'Flex'], 'required'],
            [['Dom', 'Grs', 'Maj', 'Lig', 'Standard', 'Notes'], 'default', 'value' => ''],
        ];
    }
}
