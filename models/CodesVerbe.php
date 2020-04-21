<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "_vuevscodes".
 *
 * @property string $Code
 * @property string $Modele
 * @property int $Rad
 * @property string $Rmodele
 * @property string $Inf
 * @property string $Indpr1S
 * @property string $Indpr2S
 * @property string $Indpr3S
 * @property string $Indpr1P
 * @property string $Indpr2P
 * @property string $Indpr3P
 * @property string $Indimp1S
 * @property string $Indimp2S
 * @property string $Indimp3S
 * @property string $Indimp1P
 * @property string $Indimp2P
 * @property string $Indimp3P
 * @property string $Indps1S
 * @property string $Indps2S
 * @property string $Indps3S
 * @property string $Indps1P
 * @property string $Indps2P
 * @property string $Indps3P
 * @property string $Indfut1S
 * @property string $Indfut2S
 * @property string $Indfut3S
 * @property string $Indfut1P
 * @property string $Indfut2P
 * @property string $Indfut3P
 * @property string $Condpr1S
 * @property string $Condpr2S
 * @property string $Condpr3S
 * @property string $Condpr1P
 * @property string $Condpr2P
 * @property string $Condpr3P
 * @property string $Subpr1S
 * @property string $Subpr2S
 * @property string $Subpr3S
 * @property string $Subpr1P
 * @property string $Subpr2P
 * @property string $Subpr3P
 * @property string $Subimp1S
 * @property string $Subimp2S
 * @property string $Subimp3S
 * @property string $Subimp1P
 * @property string $Subimp2P
 * @property string $Subimp3P
 * @property string $Imppr2S
 * @property string $Imppr1P
 * @property string $Imppr2P
 * @property string $Ppres
 * @property string $PpSM
 * @property string $PpSF
 * @property string $PpPM
 * @property string $PpPF
 */
class CodesVerbe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '_vuevscodes';
    }

    /**
     * {@inheritdoc}
     */
    public static function primaryKey()
    {
        return ['Code'];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Code', 'Modele', 'Rad', 'Rmodele', 'Inf',], 'required'],
            [['Indpr1S', 'Indpr2S', 'Indpr3S', 'Indpr1P', 'Indpr2P', 'Indpr3P', 'Indimp1S', 'Indimp2S', 'Indimp3S', 'Indimp1P', 'Indimp2P', 'Indimp3P', 'Indps1S', 'Indps2S', 'Indps3S', 'Indps1P', 'Indps2P', 'Indps3P', 'Indfut1S', 'Indfut2S', 'Indfut3S', 'Indfut1P', 'Indfut2P', 'Indfut3P', 'Condpr1S', 'Condpr2S', 'Condpr3S', 'Condpr1P', 'Condpr2P', 'Condpr3P', 'Subpr1S', 'Subpr2S', 'Subpr3S', 'Subpr1P', 'Subpr2P', 'Subpr3P', 'Subimp1S', 'Subimp2S', 'Subimp3S', 'Subimp1P', 'Subimp2P', 'Subimp3P', 'Imppr2S', 'Imppr1P', 'Imppr2P', 'Ppres', 'PpSM', 'PpSF', 'PpPM', 'PpPF'], 'default', 'value' => ''],
            [['Rad'], 'integer'],
            [['Code'], 'string', 'max' => 10],
            [['Modele', 'Rmodele'], 'string', 'max' => 255],
            [['Inf', 'Indpr1S', 'Indpr2S', 'Indpr3S', 'Indpr1P', 'Indpr2P', 'Indpr3P', 'Indimp1S', 'Indimp2S', 'Indimp3S', 'Indimp1P', 'Indimp2P', 'Indimp3P', 'Indps1S', 'Indps2S', 'Indps3S', 'Indps1P', 'Indps2P', 'Indps3P', 'Indfut1S', 'Indfut2S', 'Indfut3S', 'Indfut1P', 'Indfut2P', 'Indfut3P', 'Condpr1S', 'Condpr2S', 'Condpr3S', 'Condpr1P', 'Condpr2P', 'Condpr3P', 'Subpr1S', 'Subpr2S', 'Subpr3S', 'Subpr1P', 'Subpr2P', 'Subpr3P', 'Subimp1S', 'Subimp2S', 'Subimp3S', 'Subimp1P', 'Subimp2P', 'Subimp3P', 'Imppr2S', 'Imppr1P', 'Imppr2P', 'Ppres', 'PpSM', 'PpSF', 'PpPM', 'PpPF'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Code' => 'Code',
            'Modele' => 'Modele',
            'Rad' => 'Rad',
            'Rmodele' => 'Rmodele',
            'Inf' => 'Inf',
            'Indpr1S' => 'Indpr1 S',
            'Indpr2S' => 'Indpr2 S',
            'Indpr3S' => 'Indpr3 S',
            'Indpr1P' => 'Indpr1 P',
            'Indpr2P' => 'Indpr2 P',
            'Indpr3P' => 'Indpr3 P',
            'Indimp1S' => 'Indimp1 S',
            'Indimp2S' => 'Indimp2 S',
            'Indimp3S' => 'Indimp3 S',
            'Indimp1P' => 'Indimp1 P',
            'Indimp2P' => 'Indimp2 P',
            'Indimp3P' => 'Indimp3 P',
            'Indps1S' => 'Indps1 S',
            'Indps2S' => 'Indps2 S',
            'Indps3S' => 'Indps3 S',
            'Indps1P' => 'Indps1 P',
            'Indps2P' => 'Indps2 P',
            'Indps3P' => 'Indps3 P',
            'Indfut1S' => 'Indfut1 S',
            'Indfut2S' => 'Indfut2 S',
            'Indfut3S' => 'Indfut3 S',
            'Indfut1P' => 'Indfut1 P',
            'Indfut2P' => 'Indfut2 P',
            'Indfut3P' => 'Indfut3 P',
            'Condpr1S' => 'Condpr1 S',
            'Condpr2S' => 'Condpr2 S',
            'Condpr3S' => 'Condpr3 S',
            'Condpr1P' => 'Condpr1 P',
            'Condpr2P' => 'Condpr2 P',
            'Condpr3P' => 'Condpr3 P',
            'Subpr1S' => 'Subpr1 S',
            'Subpr2S' => 'Subpr2 S',
            'Subpr3S' => 'Subpr3 S',
            'Subpr1P' => 'Subpr1 P',
            'Subpr2P' => 'Subpr2 P',
            'Subpr3P' => 'Subpr3 P',
            'Subimp1S' => 'Subimp1 S',
            'Subimp2S' => 'Subimp2 S',
            'Subimp3S' => 'Subimp3 S',
            'Subimp1P' => 'Subimp1 P',
            'Subimp2P' => 'Subimp2 P',
            'Subimp3P' => 'Subimp3 P',
            'Imppr2S' => 'Imppr2 S',
            'Imppr1P' => 'Imppr1 P',
            'Imppr2P' => 'Imppr2 P',
            'Ppres' => 'Ppres',
            'PpSM' => 'Pp Sm',
            'PpSF' => 'Pp Sf',
            'PpPM' => 'Pp Pm',
            'PpPF' => 'Pp Pf',
        ];
    }
}
