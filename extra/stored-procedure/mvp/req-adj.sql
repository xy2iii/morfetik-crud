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
  '' as temps,
  '0' as rare,
  lig,
  '' as graphsav,
  notes,
  '0' as prono
from
  nslemmes
  join nscodes on nslemmes.flex = nscodes.code;