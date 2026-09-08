-- #1 Students' Table
CREATE TABLE  IF NOT EXISTS studentss (
    -- Primary Key for the students table
    student_id INT PRIMARY KEY AUTO_INCREMENT,

    -- Students' name
    student_first_name VARCHAR(50) NOT NULL,
    student_last_name VARCHAR(50) NOT NULL,

    -- Students' Course
    student_course VARCHAR(50) NOT NULL,

    -- Students' Created at Timestamp
    student_created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

) Engine=InnoDB 
DEFAULT CHARSET=utf8mb4 
COLLATE=utf8mb4_general_ci;


-- #2 Books' Table
CREATE TABLE IF NOT EXISTS books (
    -- Primary Key for the books table
    book_id INT PRIMARY KEY AUTO_INCREMENT,

    -- Books' Title
    book_title VARCHAR(100) NOT NULL,
    
    -- Book Author
    book_author VARCHAR(100) NOT NULL,

    -- Book Category
    book_category VARCHAR(50) NOT NULL,

    -- Book created at Timestamp
    book_created_at timestamp not null default current_timestamp


)


-- #3 Borrow Table
create table if not exists borrow(
    -- Primary Key for the borrow table
    borrow_id int auto_increment primary key,

    -- foreign key preferences
    book_id int not null,
    student_id int not null,

    --Borrow Timestamp not null by default
    borrow_date timestamp not null default Current_timestamp

    -- borrow return timestamp null by default
    borrow_return_date timestamp null default null,

    -- borrow table constraints and foreign keys
    constraint fk_borrow_student
        foreign key (student_id),
        references students(student_id),
        on update cascade
        on delete restrict

    constrain fk_borrow_book
        foreign key (book_id)
        references books(book_id)
        on update cascade
        on delete restrict
    
)
-- Insert Statement No.1: Students
INSERT INTO students(
    student_first_name,
    student_last_name,
    student_course
) VALUES 
('EZECHIAS', 'MONTEMOR', 'BSIT'),
('KAZUYA', 'MISHIMA', 'BSIT'),
('PAUL', 'PHOENIX', 'BSIT'),
('ZUSTIN', 'OPPA', 'BSIT');

-- Insert Statement No.2: Books
INSERT INTO books(
    book_title,
    book_author,
    book_category
) VALUES 
('unknown','test','test'),
('test','test','test'),
('test2','test2','test2');

-- Insert Statement No.3: Borrow
INSERT INTO borrow (
    student_id,
    book_id
) VALUES 
(1,2),
(2,1),
(3,3);