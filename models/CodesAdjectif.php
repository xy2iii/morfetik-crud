<?php

namespace app\models;

use yii\db\ActiveRecord;

class CodesAdjectif extends ActiveRecord
{
    public static function tableName()
    {
        return 'acodes';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Code', 'Rad'], 'required'],
            [['MS', 'MP', 'FS', 'FP'], 'default', 'value' => ''],
        ];
    }
}
