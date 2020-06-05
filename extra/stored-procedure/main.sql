delimiter $$
drop procedure createFormes$$
create procedure createFormes () BEGIN

delete from formes;
alter table formes AUTO_INCREMENT=0;
call adjectif('ms', 'M', 'S');
call adjectif('fs', 'F', 'S');
call adjectif('mp', 'M', 'P');
call adjectif('fp', 'F', 'P');

call nom('s', 'S');
call nom('p', 'P');

call verbe('Inf::', 'Inf', '', '', '');
call verbe('Ind-pr:1:S', 'Ind-pr', '1', 'S', '');
call verbe('Ind-pr:2:S', 'Ind-pr', '2', 'S', '');
call verbe('Ind-pr:3:S', 'Ind-pr', '3', 'S', '');
call verbe('Ind-pr:1:P', 'Ind-pr', '1', 'P', '');
call verbe('Ind-pr:2:P', 'Ind-pr', '2', 'P', '');
call verbe('Ind-pr:3:P', 'Ind-pr', '3', 'P', '');
call verbe('Ind-imp:1:S', 'Ind-imp', '1', 'S', '');
call verbe('Ind-imp:2:S', 'Ind-imp', '2', 'S', ''); 
call verbe('Ind-imp:3:S', 'Ind-imp', '3', 'S', ''); 
call verbe('Ind-imp:1:P', 'Ind-imp', '1', 'P', ''); 
call verbe('Ind-imp:2:P', 'Ind-imp', '2', 'P', ''); 
call verbe('Ind-imp:3:P', 'Ind-imp', '3', 'P', ''); 
call verbe('Ind-ps:1:S', 'Ind-ps', '1', 'S', '');
call verbe('Ind-ps:2:S', 'Ind-ps', '2', 'S', '');
call verbe('Ind-ps:3:S', 'Ind-ps', '3', 'S', '');
call verbe('Ind-ps:1:P', 'Ind-ps', '1', 'P', '');
call verbe('Ind-ps:2:P', 'Ind-ps', '2', 'P', '');
call verbe('Ind-ps:3:P', 'Ind-ps', '3', 'P', '');
call verbe('Ind-fut:1:S', 'Ind-fut', '1', 'S', '');
call verbe('Ind-fut:2:S', 'Ind-fut', '2', 'S', '');
call verbe('Ind-fut:3:S', 'Ind-fut', '3', 'S', '');
call verbe('Ind-fut:1:P', 'Ind-fut', '1', 'P', '');
call verbe('Ind-fut:2:P', 'Ind-fut', '2', 'P', '');
call verbe('Ind-fut:3:P', 'Ind-fut', '3', 'P', '');
call verbe('Cond-pr:1:S', 'Cond-pr', '1', 'S', '');
call verbe('Cond-pr:2:S', 'Cond-pr', '2', 'S', '');
call verbe('Cond-pr:3:S', 'Cond-pr', '3', 'S', '');
call verbe('Cond-pr:1:P', 'Cond-pr', '1', 'P', '');
call verbe('Cond-pr:2:P', 'Cond-pr', '2', 'P', '');
call verbe('Cond-pr:3:P', 'Cond-pr', '3', 'P', '');
call verbe('Sub-pr:1:S', 'Sub-pr', '1', 'S', '');
call verbe('Sub-pr:2:S', 'Sub-pr', '2', 'S', '');
call verbe('Sub-pr:3:S', 'Sub-pr', '3', 'S', '');
call verbe('Sub-pr:1:P', 'Sub-pr', '1', 'P', '');
call verbe('Sub-pr:2:P', 'Sub-pr', '2', 'P', '');
call verbe('Sub-pr:3:P', 'Sub-pr', '3', 'P', '');
call verbe('Sub-imp:1:S', 'Sub-imp', '1', 'S', '');
call verbe('Sub-imp:2:S', 'Sub-imp', '2', 'S', '');
call verbe('Sub-imp:3:S', 'Sub-imp', '3', 'S', '');
call verbe('Sub-imp:1:P', 'Sub-imp', '1', 'P', '');
call verbe('Sub-imp:2:P', 'Sub-imp', '2', 'P', '');
call verbe('Sub-imp:3:P', 'Sub-imp', '3', 'P', '');
call verbe('Imp-pr:2:S', 'Imp-pr', '2', 'S', '');
call verbe('Imp-pr:1:P', 'Imp-pr', '1', 'P', '');
call verbe('Imp-pr:2:P', 'Imp-pr', '2', 'P', '');
call verbe('Ppres::', 'Ppres', '', '', '');
call verbe('Pp::S:M', 'Pp', '', 'S', 'M');
call verbe('Pp::S:F', 'Pp', '', 'S', 'F');
call verbe('Pp::P:M', 'Pp', '', 'P', 'M');
call verbe('Pp::P:F', 'Pp', '', 'P', 'F');

insert into formes
(forme, lemmeid, lemme, catgram, cat, 
genre, num, person, temps, 
rare, lig, graphsav, notes, infos, prono)
select
  forme as forme,
  id as lemmeid,
  lemme,
  catgram as catgram,
  case
    when catgram = 'C:Coord'
    or catgram = 'C:Sub'
    or catgram = 'Prép'
    or catgram = 'Interj'
    or catgram = 'Adv' then 'Inv'
  else 'Dp' end
  as cat,
  Gender as genre,
  Number as num,
  Person as person,
  NULL as temps,
  '0' as rare,
  '' as lig,
  '' as graphsav,
  notes,
  '' as infos,
  '0' as prono
from gram;

END $$
delimiter ;
