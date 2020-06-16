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
  concat('V', id) as lemmeid,
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
