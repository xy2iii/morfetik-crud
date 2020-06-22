create procedure adjectif (IN flexion varchar(255), IN genre varchar(255), IN num varchar(255)) BEGIN
set
  @sql = CONCAT(
    "insert into formes
(forme, lemmeid, lemme, catgram, souscatgram, cat, 
genre, num, person, temps, 
variante, infos, notes)
select
  concat(
    substr(lemme, 1, length(lemme) - rad),
    (
      case
        when `",flexion,"` is null then ''
        else `",flexion,"` end
    )
  ) as forme,
  concat('A', id) as lemmeid,
  lemme,
  catgram,
  souscatgram,
  'Adj' as cat,
  '",genre,"' as genre,
  '",num,"' as num,
  '' as person,
  '' as temps,
  variante,
  infos,
  notes
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
