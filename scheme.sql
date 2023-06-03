CREATE DATABASE university;

USE university;

CREATE TABLE students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    index_number VARCHAR(10) NOT NULL
);

INSERT INTO students (firstname, surname, index_number)
VALUES ('Viktor', 'Vodnev', '96530');
