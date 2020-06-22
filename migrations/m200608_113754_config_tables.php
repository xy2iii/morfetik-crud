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

    $command = $connection->createCommand("
        CREATE TABLE `config_domaine` (
          ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
          option varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
          description varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
        ");
    $command->execute();

    $command = $connection->createCommand("
        insert into config_domaine (option, description) values
        ('admin.','administration'),
        ('aéron.','aéronautique'),
        ('agric.','agriculture'),
        ('alim.','alimentation'),
        ('ameub.-décor.','ameublement et décoration'),
        ('anthrop.','anthropologie'),
        ('archit.','architecture'),
        ('art','art'),
        ('artisan.','artisanat'),
        ('arts déc.','arts décoratifs'),
        ('astron.','astronomie'),
        ('audiovis.','audiovisuel'),
        ('biol.','biologie'),
        ('bois','bois'),
        ('bot.','botanique'),
        ('chasse','chasse'),
        ('chim.','chimie'),
        ('cin.-phot.','cinéma et photographie'),
        ('comm.','commerce'),
        ('communic.','communication (divers)'),
        ('constr.','construction'),
        ('croy.-idéol.','croyances et idéologies'),
        ('cuirs-peaux','cuirs et peaux'),
        ('culture','culture (divers)'),
        ('danse','danse'),
        ('droit-jus.','droit et justice'),
        ('écon.','économie'),
        ('écrit','écrit (divers)'),
        ('livre','édition et métiers du livre'),
        ('éduc.','éducation'),
        ('électr.','électricité'),
        ('électron.','électronique'),
        ('élev.','élevage'),
        ('énergie','énergie (divers)'),
        ('environn.-urb.','environnement et urbanisme'),
        ('espace','espace'),
        ('fin.','finance'),
        ('géog.','géographie'),
        ('géol.','géologie'),
        ('géosc.','géosciences (divers)'),
        ('habill.','habillement'),
        ('habit.','habitat'),
        ('hist.','histoire'),
        ('industr.','industrie (divers)'),
        ('info.-doc.','information et documentation'),
        ('inform.','informatique'),
        ('jeux','jeux'),
        ('ling.','linguistique'),
        ('littér.','littérature'),
        ('lois.','loisirs'),
        ('manut.-stock.','manutention et stockage'),
        ('matér.','matériaux'),
        ('math.','mathématiques'),
        ('mécan.','mécanique'),
        ('méd.','médecine'),
        ('métaux','métaux'),
        ('métrol.','métrologie'),
        ('mil.','militaire'),
        ('min.','minéralogie'),
        ('mines-carr.','mines et carrières'),
        ('mus.','musique'),
        ('nautique','nautique'),
        ('nucl.','nucléaire'),
        ('pêche','pêche'),
        ('pétrole','pétrole'),
        ('phil.','philosophie'),
        ('phys.','physique'),
        ('pol.','politique'),
        ('presse','presse'),
        ('protect.-sécur.','protection et sécurité'),
        ('psych.','psychologie'),
        ('relig.','religions'),
        ('sc.','sciences (divers)'),
        ('sémiol.-symbol.','sémiologie et symbolique'),
        ('serv.','services (divers)'),
        ('soc.','société'),
        ('spect.','spectacles'),
        ('sports','sports'),
        ('techn.','techniques (divers)'),
        ('télécomm.','télécommunications'),
        ('tempor.','temporalité'),
        ('text.','textile'),
        ('théât.','théâtre'),
        ('therm.','thermique'),
        ('toil.-parure','toilette et parure'),
        ('transp.','transports (divers)'),
        ('trav.','travail'),
        ('ménag.','travaux et équipement ménagers'),
        ('trav.publ.','travaux publics'),
        ('vie quot.','vie quotidienne (divers)'),
        ('voy.','voyages'),
        ('zool.','zoologie')
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
    $this->dropTable('config_domaine');
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
