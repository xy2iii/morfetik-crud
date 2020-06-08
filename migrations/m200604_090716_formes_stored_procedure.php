<?php

use yii\db\Migration;

/**
 * Class m200604_090716_formes_stored_procedure.
 * Used to create the stored procedure that will regenerate the "formes" tables.
 * It is ran every day and takes a significant amount of time to run.
 */
class m200604_090716_formes_stored_procedure extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $connection = Yii::$app->getDb();

    // proc-adj.sql
    $command = $connection->createCommand(<<<EOD
create procedure adjectif (IN flexion varchar(255), IN genre varchar(255), IN num varchar(255)) BEGIN
set
  @sql = CONCAT(
    "insert into formes
(forme, lemmeid, lemme, catgram, souscatgram, cat, 
genre, num, person, temps, 
rare, lig, graphsav, notes, infos)
select
  concat(
    substr(lemme, 1, length(lemme) - rad),
    (
      case
        when `",flexion,"` is null then ''
        else `",flexion,"` end
    )
  ) as forme,
  id as lemmeid,
  lemme,
  catgram,
  souscatgram,
  'Adj' as cat,
  '",genre,"' as genre,
  '",num,"' as num,
  '' as person,
  '' as temps,
  '0' as rare,
  lig,
  '' as graphsav,
  notes,
  '' as infos
from
  ( select  
  *,
  SUBSTRING_INDEX(SUBSTRING_INDEX(alemmes.flex, ';', _numbers.n), ';', -1)
  as sep_flex
    from
     _numbers inner join alemmes
     on CHAR_LENGTH(alemmes.flex)
       -CHAR_LENGTH(REPLACE(alemmes.flex, ';', '')) >= _numbers.n-1 ) as d
  join acodes on sep_flex = acodes.code;");

prepare stmt
FROM
  @sql;

execute stmt;

deallocate prepare stmt;
END 
EOD);
    $command->execute();

    // proc-nom.sql
    $command = $connection->createCommand(<<<EOD
    create procedure nom (IN flexion varchar(255), IN num varchar(255)) BEGIN
    set
      @sql = CONCAT(
        "insert into formes
    (forme, lemmeid, lemme, catgram, souscatgram, cat, 
    genre, num, person, temps, 
    rare, lig, graphsav, notes, infos)
    select
      concat(
        substr(lemme, 1, length(lemme) - rad),
        (
          case
            when `",flexion,"` is null then ''
            else `",flexion,"` end
        )
      ) as forme,
      id as lemmeid,
      lemme,
      catgram,
      souscatgram,
      'Nom' as cat,
      upper(substr(catgram, 2, 1)) as genre,
      '",num,"' as num,
      '' as person,
      '' as temps,
      '0' as rare,
      lig,
      '' as graphsav,
      notes,
      '' as infos
    from
      ( select
      *,
      SUBSTRING_INDEX(SUBSTRING_INDEX(nslemmes.flex, ';', _numbers.n), ';', -1)
      as sep_flex
        from
         _numbers inner join nslemmes
         on CHAR_LENGTH(nslemmes.flex)
           -CHAR_LENGTH(REPLACE(nslemmes.flex, ';', '')) >= _numbers.n-1 ) as d
      join nscodes on sep_flex = nscodes.code;");
    
    prepare stmt
    FROM
      @sql;
    
    execute stmt;
    
    deallocate prepare stmt;
    END   
EOD);
    $command->execute();

    // proc-verbe.sql
    $command = $connection->createCommand(<<<EOD
    create procedure verbe (IN flexion varchar(255), IN temps varchar(255),
    IN num varchar(255), IN person varchar(255), IN genre varchar(255)) BEGIN
    set
      @sql = CONCAT(
        "insert into formes
    (forme, lemmeid, lemme, catgram, souscatgram, cat, 
    genre, num, person, temps, 
    rare, lig, graphsav, notes, infos, pronominal)
        select
      concat(
        substr(lemme, 1, length(lemme) - rad),
        (
          case
            when `",flexion,"` is null then ''
            else `",flexion,"` end
        )
      ) as forme,
      id as lemmeid,
      lemme,
      catgram,
      souscatgram,
      'Vrb' as cat,
      '",genre,"' as genre,
      '",num,"' as num,
      '",person,"' as person,
      '",temps,"' as temps,
      '0' as rare,
      lig,
      '' as graphsav,
      notes,
      '' as infos,
      pronominal
    from
      ( select
      *,
      SUBSTRING_INDEX(SUBSTRING_INDEX(vslemmes.flex, ';', _numbers.n), ';', -1)
      as sep_flex
        from
         _numbers inner join vslemmes
         on CHAR_LENGTH(vslemmes.flex)
           -CHAR_LENGTH(REPLACE(vslemmes.flex, ';', '')) >= _numbers.n-1 ) as d
      join vscodes on sep_flex = vscodes.code;");
    
    prepare stmt
    FROM
      @sql;
    
    execute stmt;
    
    deallocate prepare stmt;
    END
    
EOD);
    $command->execute();

    // main.sql
    $command = $connection->createCommand(<<<EOD
create procedure createFormes () BEGIN

delete from formes;
alter table formes AUTO_INCREMENT=0;
call adjectif('ms', 'M', 'S');
call adjectif('fs', 'F', 'S');
call adjectif('mp', 'M', 'P');
call adjectif('fp', 'F', 'P');

call nom('s', 'S');
call nom('p', 'P');

call verbe('Inf::', 'Inf', '', '', '');
call verbe('Ind-pr:1:S', 'Ind-pr', '1', 'S', '');
call verbe('Ind-pr:2:S', 'Ind-pr', '2', 'S', '');
call verbe('Ind-pr:3:S', 'Ind-pr', '3', 'S', '');
call verbe('Ind-pr:1:P', 'Ind-pr', '1', 'P', '');
call verbe('Ind-pr:2:P', 'Ind-pr', '2', 'P', '');
call verbe('Ind-pr:3:P', 'Ind-pr', '3', 'P', '');
call verbe('Ind-imp:1:S', 'Ind-imp', '1', 'S', '');
call verbe('Ind-imp:2:S', 'Ind-imp', '2', 'S', ''); 
call verbe('Ind-imp:3:S', 'Ind-imp', '3', 'S', ''); 
call verbe('Ind-imp:1:P', 'Ind-imp', '1', 'P', ''); 
call verbe('Ind-imp:2:P', 'Ind-imp', '2', 'P', ''); 
call verbe('Ind-imp:3:P', 'Ind-imp', '3', 'P', ''); 
call verbe('Ind-ps:1:S', 'Ind-ps', '1', 'S', '');
call verbe('Ind-ps:2:S', 'Ind-ps', '2', 'S', '');
call verbe('Ind-ps:3:S', 'Ind-ps', '3', 'S', '');
call verbe('Ind-ps:1:P', 'Ind-ps', '1', 'P', '');
call verbe('Ind-ps:2:P', 'Ind-ps', '2', 'P', '');
call verbe('Ind-ps:3:P', 'Ind-ps', '3', 'P', '');
call verbe('Ind-fut:1:S', 'Ind-fut', '1', 'S', '');
call verbe('Ind-fut:2:S', 'Ind-fut', '2', 'S', '');
call verbe('Ind-fut:3:S', 'Ind-fut', '3', 'S', '');
call verbe('Ind-fut:1:P', 'Ind-fut', '1', 'P', '');
call verbe('Ind-fut:2:P', 'Ind-fut', '2', 'P', '');
call verbe('Ind-fut:3:P', 'Ind-fut', '3', 'P', '');
call verbe('Cond-pr:1:S', 'Cond-pr', '1', 'S', '');
call verbe('Cond-pr:2:S', 'Cond-pr', '2', 'S', '');
call verbe('Cond-pr:3:S', 'Cond-pr', '3', 'S', '');
call verbe('Cond-pr:1:P', 'Cond-pr', '1', 'P', '');
call verbe('Cond-pr:2:P', 'Cond-pr', '2', 'P', '');
call verbe('Cond-pr:3:P', 'Cond-pr', '3', 'P', '');
call verbe('Sub-pr:1:S', 'Sub-pr', '1', 'S', '');
call verbe('Sub-pr:2:S', 'Sub-pr', '2', 'S', '');
call verbe('Sub-pr:3:S', 'Sub-pr', '3', 'S', '');
call verbe('Sub-pr:1:P', 'Sub-pr', '1', 'P', '');
call verbe('Sub-pr:2:P', 'Sub-pr', '2', 'P', '');
call verbe('Sub-pr:3:P', 'Sub-pr', '3', 'P', '');
call verbe('Sub-imp:1:S', 'Sub-imp', '1', 'S', '');
call verbe('Sub-imp:2:S', 'Sub-imp', '2', 'S', '');
call verbe('Sub-imp:3:S', 'Sub-imp', '3', 'S', '');
call verbe('Sub-imp:1:P', 'Sub-imp', '1', 'P', '');
call verbe('Sub-imp:2:P', 'Sub-imp', '2', 'P', '');
call verbe('Sub-imp:3:P', 'Sub-imp', '3', 'P', '');
call verbe('Imp-pr:2:S', 'Imp-pr', '2', 'S', '');
call verbe('Imp-pr:1:P', 'Imp-pr', '1', 'P', '');
call verbe('Imp-pr:2:P', 'Imp-pr', '2', 'P', '');
call verbe('Ppres::', 'Ppres', '', '', '');
call verbe('Pp::S:M', 'Pp', '', 'S', 'M');
call verbe('Pp::S:F', 'Pp', '', 'S', 'F');
call verbe('Pp::P:M', 'Pp', '', 'P', 'M');
call verbe('Pp::P:F', 'Pp', '', 'P', 'F');

insert into formes
(forme, lemmeid, lemme, catgram, souscatgram, cat, 
genre, num, person, temps, 
rare, lig, graphsav, notes, infos, pronominal)
select
  forme as forme,
  id as lemmeid,
  lemme,
  catgram as catgram,
  souscatgram,
  case
    when catgram = 'C:Coord'
    or catgram = 'C:Sub'
    or catgram = 'Prép'
    or catgram = 'Interj'
    or catgram = 'Adv' then 'Inv'
  else 'Dp' end
  as cat,
  Gender as genre,
  Number as num,
  Person as person,
  '' as temps,
  '0' as rare,
  '' as lig,
  '' as graphsav,
  notes,
  '' as infos,
  '0' as pronominal
from gram;

insert into formes
(forme, lemmeid, lemme, catgram, souscatgram, cat, 
genre, num, person, temps, 
rare, lig, graphsav, notes, infos, pronominal)
select
  lemme as forme,
  id as lemmeid,
  lemme,
  'adv' as catgram,
  souscatgram,
  'adv' as cat,
  '' as genre,
  '' as num,
  '' as person,
  '' as temps,
  '0' as rare,
  '' as lig,
  '' as graphsav,
  '' as notes,
  '' as infos,
  '0' as pronominal
from adv;

END
EOD);
    $command->execute();
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $connection = Yii::$app->getDb();
    $command = $connection->createCommand("drop procedure createFormes;");
    $command->execute();
    $command = $connection->createCommand("drop procedure verbe;");
    $command->execute();
    $command = $connection->createCommand("drop procedure nom;");
    $command->execute();
    $command = $connection->createCommand("drop procedure adjectif;");
    $command->execute();
  }

  /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200604_090716_formes_stored_procedure cannot be reverted.\n";

        return false;
    }
    */
}
