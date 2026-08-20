create database <database_name>;
connect <database_name>;
show databases;
create table <table_name>_in_plural>;
INSERT INTO <table_name_in_plural>
    (columns) values
    (values);






# utility commands
\! cls 

mysqldump -u root -p  --databases library_db > D:\dev\it30b\backups

retrieve database/backup time -- source D:\dev\it30b\backups\08182026_library_db.sql (directory of the backup)


automated with date and time backup -- mysqldump -u root -p --databases library_db > "D:\dev\it30b\backups\%date:~-4%%date:~4,2%%date:~7,2%_%time:~0,2%%time:~3,2%%time:~6,2%_library_db.sql