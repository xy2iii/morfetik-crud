select
  concat(
    substr(lemme, 1, length(lemme) - rad),
    (
      case
        when `Ind-fut:3:S` is null then ''
        else `Ind-fut:3:S` end
    )
  ) as forme,
  id as lemmeid,
  lemme,
  catgram,
  'Adj' as cat,
  '' as genre,
  '' as num,
  '' as person,
  NULL as temps,
  '0' as rare,
  lig,
  '' as graphsav,
  notes,
  '0' as prono
from
  ( select
  *,
  SUBSTRING_INDEX(SUBSTRING_INDEX(vslemmes.flex, ';', _numbers.n), ';', -1)
  as sep_flex
    from
     _numbers inner join vslemmes
     on CHAR_LENGTH(vslemmes.flex)
       -CHAR_LENGTH(REPLACE(vslemmes.flex, ';', '')) >= _numbers.n-1 ) as d
  join vscodes on sep_flex = vscodes.code;