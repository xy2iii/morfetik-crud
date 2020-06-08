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
