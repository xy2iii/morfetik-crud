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
            [['ID', 'Lemme', 'CatGram', 'Flex',], 'required'],
            [['Lig'], 'default', 'value' => ''],
            [['Standard', 'Notes'], 'default']
        ];
    }
}
