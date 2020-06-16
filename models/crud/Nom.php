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
            [['souscatgram', 'Dom', 'Grs', 'Maj', 'Lig', 'Standard', 'Notes'], 'default', 'value' => ''],
        ];
    }
}
