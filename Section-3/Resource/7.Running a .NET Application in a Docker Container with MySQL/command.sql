CREATE DATABASE IF NOT EXISTS appdb;

CREATE USER IF NOT EXISTS 'appusr'@'%'
IDENTIFIED BY 'appusr@1090';

GRANT SELECT, INSERT, UPDATE, DELETE
ON appdb.* TO 'appusr'@'%';

USE appdb;

DROP TABLE IF EXISTS Employee_Information;

CREATE TABLE Employee_Information
(
    Employee_ID INT PRIMARY KEY,
    Employee_Name VARCHAR(100),
    Employee_Image VARCHAR(255),
    Phone VARCHAR(15)
);

INSERT INTO Employee_Information
(Employee_ID, Employee_Name, Employee_Image, Phone)
VALUES
(1, 'Rahul', 'images/rahul.jpg', '565466'),
(2, 'Amit', 'images/amit.jpg', '9565455'),
(3, 'Priya', 'images/priya.jpg', '565468');

SELECT * FROM Employee_Information;

FLUSH PRIVILEGES;