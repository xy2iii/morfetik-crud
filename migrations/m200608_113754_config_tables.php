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
          option varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
        ");
    $command->execute();

    $command = $connection->createCommand("
        insert into config_alemmes_souscatgram (option) values
        ('adjm'),
        ('adjf'),
        ('adj(m)'),
        ('adj(f)'),
        ('adjms'),
        ('adjmp'),
        ('adjfs'),
        ('adjfp'),
        ('adjord'),
        ('loc adj'),
        ('')
        ");
    $command->execute();

    $command = $connection->createCommand("
        CREATE TABLE `config_adv_souscatgram` (
          ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
          option varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
        ");
    $command->execute();

    $command = $connection->createCommand("
        insert into config_adv_souscatgram (option) values
        ('loc adv'),
        ('')
        ");


    $command = $connection->createCommand("
        CREATE TABLE `config_gram_catgram` (
          ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
          option varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
        ");
    $command->execute();

    $command = $connection->createCommand("
        insert into config_gram_catgram (option) values
        ('C'),
        ('D'),
        ('Interj'),
        ('Ph'),
        ('P'),
        ('Prép'),
        ('sig'),
        ('')
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
