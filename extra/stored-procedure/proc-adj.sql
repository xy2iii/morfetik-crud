delimiter $$
drop procedure adjectif$$
create procedure adjectif (IN flexion varchar(255), IN genre varchar(255), IN num varchar(255)) BEGIN
set
  @sql = CONCAT(
    "insert into formes
(forme, lemmeid, lemme, catgram, cat, 
genre, num, person, temps, 
rare, lig, graphsav, notes, infos, souscatgram)
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
  'Adj' as cat,
  '",genre,"' as genre,
  '",num,"' as num,
  '' as person,
  '' as temps,
  '0' as rare,
  lig,
  '' as graphsav,
  notes,
  '' as infos,
  souscatgram
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
END $$
delimiter ;
