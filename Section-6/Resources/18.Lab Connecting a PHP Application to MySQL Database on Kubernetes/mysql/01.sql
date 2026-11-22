-- Create database
CREATE DATABASE IF NOT EXISTS empdb;

-- Select database
USE empdb;

-- Delete old table
DROP TABLE IF EXISTS Employee_Information;

-- Create new table
CREATE TABLE Employee_Information
(
    Employee_ID INT PRIMARY KEY,
    Employee_Name VARCHAR(100),
    Phone VARCHAR(15),
    Employee_Image VARCHAR(255)
);

-- Insert records
INSERT INTO Employee_Information
(Employee_ID, Employee_Name, Phone, Employee_Image)
VALUES
(1, 'Rahul', '9565466', 'rahul.jpg'),
(2, 'Amit', '9565455', 'amit.jpg'),
(3, 'Priya', '9565468', 'priya.jpg');

-- Display records
SELECT * FROM Employee_Information;