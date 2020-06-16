<?php

namespace app\models\crud;

use Yii;

/**
 * This is the model class for table "vslemmes".
 *
 * @property string $ID
 * @property string $Lemme
 * @property string $CatGram
 * @property string $Flex
 * @property string|null $Lig
 * @property string|null $Standard
 * @property string|null $Notes
 */
class Verbe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vslemmes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Lemme', 'Flex'], 'required'],
            [['Notes'], 'string'],
            [['CatGram'], 'string', 'max' => 10],
            [['souscatgram'], 'default', 'value' => ''],
            [['Lemme'], 'string', 'max' => 255],
            [['Flex'], 'string', 'max' => 20],
            [['Lig'], 'string', 'max' => 5],
            [['Standard'], 'string', 'max' => 256],
            [['pronominal'], 'number'],
            [['ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Lemme' => 'Lemme',
            'CatGram' => 'Cat Gram',
            'Flex' => 'Flex',
            'Lig' => 'Lig',
            'Standard' => 'Standard',
            'Notes' => 'Notes',
            'pronominal' => 'Pronominal',
        ];
    }
}
