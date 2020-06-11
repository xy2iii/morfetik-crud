<?php

use yii\db\Migration;

/**
 * Class m200608_113754_config_tables.
 * 
 * Config tables determine the values that are present in editing dropdowns.
 */
class m200608_113754_config_tables extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $connection = Yii::$app->getDb();

    $command = $connection->createCommand("
        CREATE TABLE `config_alemmes_souscatgram` (
          ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
          option varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
          description varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
        ");
    $command->execute();

    $command = $connection->createCommand("
        insert into config_alemmes_souscatgram (option, description) values
        ('adjm', 'Adjectif masculin'),
        ('adjf', 'Adjectif féminin'),
        ('adj(m)', 'Adjectif généralement masculin'),
        ('adj(f)', 'Adjectif généralement féminin'),
        ('adjms', 'Adjectif masculin singulier'),
        ('adjmp', 'Adjectif masculin pluriel'),
        ('adjfs', 'Adjectif féminin singulier'),
        ('adjfp', 'Adjectif féminin pluriel'),
        ('adjord',  'Adjectif numéral ordinal'),
        ('loc adj', 'Locution adverbiale'),
        ('', 'Non rempli')
        ");
    $command->execute();

    $command = $connection->createCommand("
        CREATE TABLE `config_adv_souscatgram` (
          ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
          option varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
          description varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
        ");
    $command->execute();

    $command = $connection->createCommand("
        insert into config_adv_souscatgram (option, description) values
        ('loc adv', 'Locution adverbiale'),
        ('', 'Non rempli')
        ");
    $command->execute();

    $command = $connection->createCommand("
        CREATE TABLE `config_gram_catgram` (
          ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
          option varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
          description varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
        ");
    $command->execute();

    $command = $connection->createCommand("
        insert into config_gram_catgram (option, description) values
        ('C', 'Conjonction'),
        ('D', 'Déterminant'),
        ('Interj', 'Interjection'),
        ('Ph', 'Phrase'),
        ('P', 'Pronom'),
        ('Prép', 'Préposition'),
        ('sig', 'Sigle'),
        ('C:Coord', 'Conjonction de coordination'),
        ('C:Sub', 'Conjonction de subordination'),
        ('D:Déf', 'Déterminant défini') ,
        ('D:Dém', 'Déterminant démonstratif'),
        ('D:Excl', 'Déterminant exclamatif'),
        ('D:Ind', 'Déterminant indicatif'),
        ('D:Int', 'Déterminant interrogatif'),
        ('D:Num', 'Déterminant numéral'),
        ('D:Part', 'Déterminant partitif'),
        ('D:Poss', 'Déterminant possessif'),
        ('D:Rel', 'Déterminant relatif'),
        ('Interj', 'Interjection'),
        ('loc', 'Locution'),
        ('loc C', 'Locution conjonctive'),
        ('loc D', 'Locution déterminative'),
        ('loc Interj', 'Locution interjective'),
        ('loc P', 'Locution pronominale'),
        ('loc Ph', 'Locution-phrase'),
        ('loc Prép', 'Locution prépositionelle'),
        ('P:Dém', 'Pronom démonstratif'),
        ('P:Ind', 'Pronom indicatif'),
        ('P:Int', 'Pronom interrogatif'),
        ('P:Pers', 'Pronom personnel'),
        ('P:Poss', 'Pronom possessif'),
        ('P:Rel', 'Pronom relatif'),
        ('', 'Non rempli')
        ");
    $command->execute();


    $command = $connection->createCommand("
        CREATE TABLE `config_gram_souscatgram` (
          ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
          option varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
          description varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
        ");
    $command->execute();

    $command = $connection->createCommand("
        insert into config_gram_souscatgram (option, description) values
        ('C:Coord', 'Conjonction de coordination'),
        ('C:Sub', 'Conjonction de subordination'),
        ('D:Déf', 'Déterminant défini') ,
        ('D:Dém', 'Déterminant démonstratif'),
        ('D:Excl', 'Déterminant exclamatif'),
        ('D:Ind', 'Déterminant indicatif'),
        ('D:Int', 'Déterminant interrogatif'),
        ('D:Num', 'Déterminant numéral'),
        ('D:Part', 'Déterminant partitif'),
        ('D:Poss', 'Déterminant possessif'),
        ('D:Rel', 'Déterminant relatif'),
        ('Interj', 'Interjection'),
        ('loc', 'Locution'),
        ('loc C', 'Locution conjonctive'),
        ('loc D', 'Locution déterminative'),
        ('loc Interj', 'Locution interjective'),
        ('loc P', 'Locution pronominale'),
        ('loc Ph', 'Locution-phrase'),
        ('loc Prép', 'Locution prépositionelle'),
        ('P:Dém', 'Pronom démonstratif'),
        ('P:Ind', 'Pronom indicatif'),
        ('P:Int', 'Pronom interrogatif'),
        ('P:Pers', 'Pronom personnel'),
        ('P:Poss', 'Pronom possessif'),
        ('P:Rel', 'Pronom relatif'),
        ('', 'Non rempli')
        ");
    $command->execute();

    $command = $connection->createCommand("
        CREATE TABLE `config_nslemmes_souscatgram` (
          ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
          option varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
          description varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
        ");
    $command->execute();

    $command = $connection->createCommand("
        insert into config_nslemmes_souscatgram (option, description) values
        ('nm', 'Nom masculin (flexion)'),
        ('nms', 'Nom masculin singulier'),
        ('nmp', 'Nom masculin pluriel'),
        ('nf', 'Nom féminin (flexion)'),
        ('nfs', 'Nom féminin singulier'),
        ('nfp', 'Nom féminin pluriel'),
        ('np', 'Nom pluriel'),
        ('loc n', 'Location nominale'),
        ('', 'Non rempli')
        ");
    $command->execute();

    $command = $connection->createCommand("
        CREATE TABLE `config_vslemmes_souscatgram` (
          ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
          option varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
          description varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
        ");
    $command->execute();

    $command = $connection->createCommand("
        insert into config_vslemmes_souscatgram (option, description) values
        ('vi', 'Verbe intransitif'),
        ('vt', 'Verbe transitif'),
        ('vt (vpr)', 'Verbe transitif (verbe pronominal)'),
        ('loc v', 'Locution verbale'),
        ('', 'Non rempli')
        ");
    $command->execute();
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable('config_alemmes_souscatgram');
    $this->dropTable('config_adv_souscatgram');
    $this->dropTable('config_gram_catgram');
    $this->dropTable('config_gram_souscatgram');
    $this->dropTable('config_nslemmes_souscatgram');
    $this->dropTable('config_vslemmes_souscatgram');
  }

  /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200608_113754_config_tables cannot be reverted.\n";

        return false;
    }
    */
}
