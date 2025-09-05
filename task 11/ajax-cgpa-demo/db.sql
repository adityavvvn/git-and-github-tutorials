CREATE DATABASE IF NOT EXISTS sample;
USE sample;

CREATE TABLE student (
  id INT AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(50),
  lastname VARCHAR(50),
  rollno INT,
  cgpa DECIMAL(3,1)
);

INSERT INTO student (firstname, lastname, rollno, cgpa) VALUES
('Uday', 'Aditya', 1, 8.5),
('Priya', 'Rao', 2, 8.0),
('Rahul', 'Verma', 3, 9.2),
('Anjali', 'Patel', 4, 7.5),
('Vikram', 'Singh', 5, 8.0),
('Sneha', 'Nair', 6, 9.2);
