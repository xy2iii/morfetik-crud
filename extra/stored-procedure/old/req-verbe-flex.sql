select
  *,
  SUBSTRING_INDEX(SUBSTRING_INDEX(vslemmes.flex, ';', _numbers.n), ';', -1)
  as sep_flex
    from
     _numbers inner join vslemmes
     on CHAR_LENGTH(vslemmes.flex)
       -CHAR_LENGTH(REPLACE(vslemmes.flex, ';', '')) >= _numbers.n-1