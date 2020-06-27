select
  *,
  SUBSTRING_INDEX(SUBSTRING_INDEX(alemmes.flex, ';', _numbers.n), ';', -1)
  as sep_flex
    from
     _numbers inner join alemmes
     on CHAR_LENGTH(alemmes.flex)
       -CHAR_LENGTH(REPLACE(alemmes.flex, ';', '')) >= _numbers.n-1