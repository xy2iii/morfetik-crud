<?php

use yii\db\Migration;

/**
 * Class m200513_142326_morfetik_schema
 */
class m200513_142326_morfetik_schema extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $connection = Yii::$app->getDb();
    $command = $connection->createCommand("
        CREATE TABLE `acodes` (
          `Code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Rad` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
          `MS` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
          `MP` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
          `FS` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
          `FP` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
          PRIMARY KEY (`Code`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;");
    $command->execute();
    $command = $connection->createCommand("
        CREATE TABLE `adv` (
          `ID` bigint COLLATE utf8mb4_unicode_ci NOT NULL AUTO_INCREMENT,
          `Lemme` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
          `souscatgram` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
          `variante` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
          `infos` varchar(510) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
          `Notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
          PRIMARY KEY (`ID`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");
    $command->execute();
    $command = $connection->createCommand("
        CREATE TABLE `alemmes` (
          `ID` bigint COLLATE utf8mb4_unicode_ci NOT NULL AUTO_INCREMENT,
          `Lemme` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `CatGram` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `souscatgram` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
          `Flex` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `variante` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
          `infos` varchar(510) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
          `Notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
          PRIMARY KEY (`ID`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
        ");
    $command->execute();
    $command = $connection->createCommand("
        CREATE TABLE `gram` (
          `ID` bigint COLLATE utf8mb4_unicode_ci NOT NULL AUTO_INCREMENT,
          `Lemme` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
          `Forme` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
          `CatGram` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
          `souscatgram` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
          `Gender` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
          `Number` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
          `Person` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
          `variante` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
          `infos` varchar(510) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
          `Notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
          PRIMARY KEY (`ID`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");
    $command->execute();
    $command = $connection->createCommand("
        CREATE TABLE `nscodes` (
          `Code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Rad` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `S` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
          `P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
          PRIMARY KEY (`Code`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
        ");
    $command->execute();
    $command = $connection->createCommand("
        CREATE TABLE `nslemmes` (
          `ID` bigint COLLATE utf8mb4_unicode_ci NOT NULL AUTO_INCREMENT,
          `Lemme` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `CatGram` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `souscatgram` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
          `Flex` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Dom` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
          `Notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
          PRIMARY KEY (`ID`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
        ");
    $command->execute();
    $command = $connection->createCommand("
        CREATE TABLE `vpr_import` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `verbe` varchar(255) NOT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ");
    $command->execute();
    $command = $connection->createCommand("
        CREATE TABLE `vscodes` (
          `Code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Modele` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Rad` int(11) NOT NULL,
          `R-modele` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Inf::` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-pr:1:S` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-pr:2:S` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-pr:3:S` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-pr:1:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-pr:2:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-pr:3:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-imp:1:S` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-imp:2:S` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-imp:3:S` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-imp:1:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-imp:2:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-imp:3:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-ps:1:S` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-ps:2:S` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-ps:3:S` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-ps:1:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-ps:2:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-ps:3:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-fut:1:S` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-fut:2:S` varchar(50) NOT NULL,
          `Ind-fut:3:S` varchar(50) NOT NULL,
          `Ind-fut:1:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-fut:2:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ind-fut:3:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Cond-pr:1:S` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Cond-pr:2:S` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Cond-pr:3:S` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Cond-pr:1:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Cond-pr:2:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Cond-pr:3:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Sub-pr:1:S` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Sub-pr:2:S` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Sub-pr:3:S` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Sub-pr:1:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Sub-pr:2:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Sub-pr:3:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Sub-imp:1:S` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Sub-imp:2:S` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Sub-imp:3:S` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Sub-imp:1:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Sub-imp:2:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Sub-imp:3:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Imp-pr:2:S` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Imp-pr:1:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Imp-pr:2:P` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Ppres::` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Pp::S:M` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Pp::S:F` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Pp::P:M` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `Pp::P:F` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          PRIMARY KEY (`Code`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;        
        ");
    $command->execute();
    $command = $connection->createCommand("
        CREATE TABLE `vslemmes` (
          `ID` bigint COLLATE utf8mb4_unicode_ci NOT NULL AUTO_INCREMENT,
          `Lemme` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `CatGram` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vrb',
          `souscatgram` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
          `Flex` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
          `variante` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
          `infos` varchar(510) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
          `Notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
          `pronominal` tinyint NOT NULL DEFAULT 0,
          PRIMARY KEY (`ID`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
        ");
    $command->execute();
    $command = $connection->createCommand("
CREATE TABLE `formes` (
    `formeid` bigint COLLATE utf8mb4_unicode_ci NOT NULL AUTO_INCREMENT,
    `forme` varchar(510) COLLATE utf8mb4_unicode_ci NOT NULL,
    `lemmeid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `lemme` varchar(510) COLLATE utf8mb4_unicode_ci NOT NULL,
    `catgram` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `souscatgram` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `cat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `genre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `num` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `person` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `temps` varchar(510) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `variante` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `infos` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
    `notes` varchar(510) COLLATE utf8mb4_unicode_ci DEFAULT '',
    `pronominal` tinyint NOT NULL DEFAULT 0,
    KEY `formeid` (`formeid`),
    KEY `forme` (`forme`(333)),
    KEY `lemmeid` (`lemmeid`),
    KEY `lemme` (`lemme`(333)),
    KEY `catgram` (`catgram`),
    KEY `cat` (`cat`),
    KEY `genre` (`genre`),
    KEY `num` (`num`),
    KEY `person` (`person`),
    KEY `temps` (`temps`(333)),
    KEY `notes` (`notes`(333)),
    KEY `infos` (`infos`),
	UNIQUE INDEX `forme_lemme` (`forme`(40), formeid, `lemme`(40))
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
    $command->execute();
  }

  // Config tables

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable('acodes');
    $this->dropTable('adv');
    $this->dropTable('alemmes');
    $this->dropTable('gram');
    $this->dropTable('nscodes');
    $this->dropTable('nslemmes');
    $this->dropTable('vpr_import');
    $this->dropTable('vscodes');
    $this->dropTable('vslemmes');
    $this->dropTable('formes');
  }

  /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200513_142326_morfetik_schema cannot be reverted.\n";

        return false;
    }
    */
}
