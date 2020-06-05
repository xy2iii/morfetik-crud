insert into formes
(forme, lemmeid, lemme, catgram, cat, 
genre, num, person, temps, 
rare, lig, graphsav, notes, infos, prono)
select
  concat(
    substr(lemme, 1, length(lemme) - rad),
    (
      case
        when `p` is null then ''
        else `p` end
    )
  ) as forme,
  id as lemmeid,
  lemme,
  catgram,
  'Adj' as cat,
  upper(substr(catgram, 2, 1)) as genre,
  'P' as num,
  '' as person,
  NULL as temps,
  '0' as rare,
  lig,
  '' as graphsav,
  notes,
  '' as info,
  '0' as prono
from
  ( select
  *,
  SUBSTRING_INDEX(SUBSTRING_INDEX(nslemmes.flex, ';', _numbers.n), ';', -1)
  as sep_flex
    from
     _numbers inner join nslemmes
     on CHAR_LENGTH(nslemmes.flex)
       -CHAR_LENGTH(REPLACE(nslemmes.flex, ';', '')) >= _numbers.n-1 ) as d
  join nscodes on sep_flex = nscodes.code;
