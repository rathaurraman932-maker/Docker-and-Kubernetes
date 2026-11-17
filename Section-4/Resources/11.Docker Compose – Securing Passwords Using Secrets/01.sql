CREATE DATABASE IF NOT EXISTS appdb;

CREATE USER IF NOT EXISTS 'appusr'@'%' IDENTIFIED BY 'appusr@1090';

GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;

USE appdb;

DROP TABLE IF EXISTS Employee_Information;

CREATE TABLE Employee_Information
(
    Employee_ID INT PRIMARY KEY,
    Employee_Name VARCHAR(100),
    Phone VARCHAR(15)
);

INSERT INTO Employee_Information
(Employee_ID, Employee_Name, Phone)
VALUES
(1, 'Rahul', '9565466'),
(2, 'Amit', '9565455'),
(3, 'Priya','9565468');

SELECT * FROM Employee_Information;

FLUSH PRIVILEGES;