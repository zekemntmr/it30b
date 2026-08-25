create database <database_name>;
connect <database_name>;
show databases;
create table <table_name>_in_plural>;
INSERT INTO <table_name_in_plural>
    (columns) values
    (values);
CReate table books(
    book_id INT AUTO_INCREMENT PRIMARY KEY,
    book_title varchar(100) not null,
    book_author varchar(100) not null,
    book_category varchar(50) not null,
    book_created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE <table_name> add column <column_name> TIMESTAMP NULL DEFAULT NULL;

INSERT METHOD -- INSERT INTO students(student_first_name,student_last_name,student_course) VALUES ("MISHIMA","KAZUYA","BSIT");



# utility commands
\! cls 

mysqldump -u root -p  --databases library_db > D:\dev\it30b\backups

retrieve database/backup time -- source D:\dev\it30b\backups\08182026_library_db.sql (directory of the backup)


automated with date and time backup -- mysqldump -u root -p --databases library_db > "D:\dev\it30b\backups\%date:~-4%%date:~4,2%%date:~7,2%_%time:~0,2%%time:~3,2%%time:~6,2%_library_db.sql

lab 2

ALTER TABLE <table_name> add column <column_name> TIMESTAMP NULL DEFAULT NULL; -- ADD COLUMN

UPDATE -- UPDATE students SET student_created_at = CURRENT_TIMESTAMP WHERE student_created_at IS NULL -- update

ALTER TABLE students MODIFY COLUMN  student_created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; -- automated student_created_at timestamp when adding new data

joins table -- select br.borrow_id, s.student_id,
    CONCAT(s.student_first_name, ' ', s.student_last_name) AS student_name, s.student_course,
    b.book_title, b.book_author, b.book_category,
    br.borrow_date 
FROM borrow br
    JOIN students s ON br.student_id = s.student_id
    JOIN books b ON br.book_id = s.student_id
ORDER BY br.borrow_date DESC;