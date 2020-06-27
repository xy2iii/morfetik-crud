select
  *,
  SUBSTRING_INDEX(SUBSTRING_INDEX(nslemmes.flex, ';', _numbers.n), ';', -1)
  as sep_flex
    from
     _numbers inner join nslemmes
     on CHAR_LENGTH(nslemmes.flex)
       -CHAR_LENGTH(REPLACE(nslemmes.flex, ';', '')) >= _numbers.n-1