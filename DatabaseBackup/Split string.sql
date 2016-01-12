call Splitter('Charlie,Sumergido,Bobis;Reinen,R,Constantino;Eliseo,R,Montefalcon',';');

 SET @var = (select * from splitResults limit 1);

set @firstName = SPLIT_STR(@var, ',', 1);
set @middleName = SPLIT_STR(@var, ',', 2);
set @lastName = SPLIT_STR(@var, ',', 3);

SPLIT_STR