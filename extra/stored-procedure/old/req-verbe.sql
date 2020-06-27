
select
  concat(
    substr(lemme, 1, length(lemme) - rad),
    (
      case
        when `Inf::` is null then ''
        else `Inf::` end
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
  vslemmes
  join vscodes on vslemmes.flex = vscodes.code;