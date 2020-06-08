<?php

namespace app\models\crud\config;

use Yii;

/**
 * This is the model class for table "config_alemmes_souscatgram".
 *
 * @property int $id
 * @property string $option
 */
class ConfigAdjectifSouscatgram extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'config_alemmes_souscatgram';
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
