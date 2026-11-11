-- Create database
CREATE DATABASE IF NOT EXISTS appdb;

-- Select database
USE appdb;

-- Delete old table
DROP TABLE IF EXISTS Employee_Information;

-- Create new table
CREATE TABLE Employee_Information
(
    Employee_ID INT PRIMARY KEY,
    Employee_Name VARCHAR(100),
    Phone VARCHAR(15)
);

-- Insert records
INSERT INTO Employee_Information
(Employee_ID, Employee_Name, Phone)
VALUES
(1, 'Rahul', '9565466'),
(2, 'Amit', '9565455'),
(3, 'Priya', '9565468');

-- Display records
SELECT * FROM Employee_Information;