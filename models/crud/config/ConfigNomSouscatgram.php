<?php

namespace app\models\crud\config;

use Yii;

/**
 * @property int $id
 * @property string $option
 */
class ConfigNomSouscatgram extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'config_nslemmes_souscatgram';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['option'], 'required'],
            [['option'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'option' => 'Option',
        ];
    }
}
