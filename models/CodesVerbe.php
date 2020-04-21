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
            'Modele' => 'Modèle',
            'Rad' => 'Rad',
            'Rmodele' => 'Rmodele',
            'Inf' => 'Infinitif',
            'Indpr1S' => 'Ind:pr:1S',
            'Indpr2S' => 'Ind:pr:2S',
            'Indpr3S' => 'Ind:pr:3S',
            'Indpr1P' => 'Ind:pr:1P',
            'Indpr2P' => 'Ind:pr:2P',
            'Indpr3P' => 'Ind:pr:3P',
            'Indimp1S' => 'Ind:imp:1S',
            'Indimp2S' => 'Ind:imp:2S',
            'Indimp3S' => 'Ind:imp:3S',
            'Indimp1P' => 'Ind:imp:1P',
            'Indimp2P' => 'Ind:imp:2P',
            'Indimp3P' => 'Ind:imp:3P',
            'Indps1S' => 'Ind:ps:1S',
            'Indps2S' => 'Ind:ps:2S',
            'Indps3S' => 'Ind:ps:3S',
            'Indps1P' => 'Ind:ps:1P',
            'Indps2P' => 'Ind:ps:2P',
            'Indps3P' => 'Ind:ps:3P',
            'Indfut1S' => 'Ind:fut:1S',
            'Indfut2S' => 'Ind:fut:2S',
            'Indfut3S' => 'Ind:fut:3S',
            'Indfut1P' => 'Ind:fut:1P',
            'Indfut2P' => 'Ind:fut:2P',
            'Indfut3P' => 'Ind:fut:3P',
            'Condpr1S' => 'Cond:pr:1S',
            'Condpr2S' => 'Cond:pr:2S',
            'Condpr3S' => 'Cond:pr:3S',
            'Condpr1P' => 'Cond:pr:1P',
            'Condpr2P' => 'Cond:pr:2P',
            'Condpr3P' => 'Cond:pr:3P',
            'Subpr1S' => 'Sub:pr:1S',
            'Subpr2S' => 'Sub:pr:2S',
            'Subpr3S' => 'Sub:pr:3S',
            'Subpr1P' => 'Sub:pr:1P',
            'Subpr2P' => 'Sub:pr:2P',
            'Subpr3P' => 'Sub:pr:3P',
            'Subimp1S' => 'Sub:imp:1S',
            'Subimp2S' => 'Sub:imp:2S',
            'Subimp3S' => 'Sub:imp:3S',
            'Subimp1P' => 'Sub:imp:1P',
            'Subimp2P' => 'Sub:imp:2P',
            'Subimp3P' => 'Sub:imp:3P',
            'Imppr2S' => 'Imp:pr:2S',
            'Imppr1P' => 'Imp:pr:1P',
            'Imppr2P' => 'Imp:pr:2P',
            'Ppres' => 'Ppres',
            'PpSM' => 'Pp:SM',
            'PpSF' => 'Pp:SF',
            'PpPM' => 'Pp:PM',
            'PpPF' => 'Pp:PF',
        ];
    }
}
