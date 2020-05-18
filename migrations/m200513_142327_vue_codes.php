<?php

use yii\db\Migration;
use yii\db\Query;

class m200513_142327_vue_codes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("create view _vuevscodes as select 
Code as Code,
Modele as Modele,
Rad as Rad,
`R-modele` as `Rmodele`,
`Inf::` as `Inf`,
`Ind-pr:1:S` as `Indpr1S`,
`Ind-pr:2:S` as `Indpr2S`,
`Ind-pr:3:S` as `Indpr3S`,
`Ind-pr:1:P` as `Indpr1P`,
`Ind-pr:2:P` as `Indpr2P`,
`Ind-pr:3:P` as `Indpr3P`,
`Ind-imp:1:S` as `Indimp1S`,
`Ind-imp:2:S` as `Indimp2S`,
`Ind-imp:3:S` as `Indimp3S`,
`Ind-imp:1:P` as `Indimp1P`,
`Ind-imp:2:P` as `Indimp2P`,
`Ind-imp:3:P` as `Indimp3P`,
`Ind-ps:1:S` as `Indps1S`,
`Ind-ps:2:S` as `Indps2S`,
`Ind-ps:3:S` as `Indps3S`,
`Ind-ps:1:P` as `Indps1P`,
`Ind-ps:2:P` as `Indps2P`,
`Ind-ps:3:P` as `Indps3P`,
`Ind-fut:1:S` as `Indfut1S`,
`Ind-fut:2:S` as `Indfut2S`,
`Ind-fut:3:S` as `Indfut3S`,
`Ind-fut:1:P` as `Indfut1P`,
`Ind-fut:2:P` as `Indfut2P`,
`Ind-fut:3:P` as `Indfut3P`,
`Cond-pr:1:S` as `Condpr1S`,
`Cond-pr:2:S` as `Condpr2S`,
`Cond-pr:3:S` as `Condpr3S`,
`Cond-pr:1:P` as `Condpr1P`,
`Cond-pr:2:P` as `Condpr2P`,
`Cond-pr:3:P` as `Condpr3P`,
`Sub-pr:1:S` as `Subpr1S`,
`Sub-pr:2:S` as `Subpr2S`,
`Sub-pr:3:S` as `Subpr3S`,
`Sub-pr:1:P` as `Subpr1P`,
`Sub-pr:2:P` as `Subpr2P`,
`Sub-pr:3:P` as `Subpr3P`,
`Sub-imp:1:S` as `Subimp1S`,
`Sub-imp:2:S` as `Subimp2S`,
`Sub-imp:3:S` as `Subimp3S`,
`Sub-imp:1:P` as `Subimp1P`,
`Sub-imp:2:P` as `Subimp2P`,
`Sub-imp:3:P` as `Subimp3P`,
`Imp-pr:2:S` as `Imppr2S`,
`Imp-pr:1:P` as `Imppr1P`,
`Imp-pr:2:P` as `Imppr2P`,
`Ppres::` as `Ppres`,
`Pp::S:M` as `PpSM`,
`Pp::S:F` as `PpSF`,
`Pp::P:M` as `PpPM`,
`Pp::P:F` as `PpPF`
from vscodes");
        $command->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $connection = Yii::$app->getDb();
        $connection->createCommand()
            ->dropView('_vuevscodes')->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200505_132519_create_vue_verbe cannot be reverted.\n";

        return false;
    }
    */
}
