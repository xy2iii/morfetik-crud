<?php

namespace app\models;

use yii\db\ActiveRecord;

class CodesNom extends ActiveRecord
{
    public static function tableName()
    {
        return 'nscodes';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Code', 'Rad'], 'required'],
            [['S', 'P'], 'default', 'value' => ''],
        ];
    }
}
