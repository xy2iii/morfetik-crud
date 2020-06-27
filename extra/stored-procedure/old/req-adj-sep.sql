select
  concat(
    substr(lemme, 1, length(lemme) - rad),
    (
      case
        when ms is null then ''
        else ms end
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
  SUBSTRING_INDEX(SUBSTRING_INDEX(alemmes.flex, ';', _numbers.n), ';', -1)
  as sep_flex
    from
     _numbers inner join alemmes
     on CHAR_LENGTH(alemmes.flex)
       -CHAR_LENGTH(REPLACE(alemmes.flex, ';', '')) >= _numbers.n-1 ) as d
  join acodes on sep_flex = acodes.code;