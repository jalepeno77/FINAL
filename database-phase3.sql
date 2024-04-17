CREATE DATABASE IF NOT EXISTS finaltest;

USE finaltest;

CREATE TABLE `Members` (
    Member_ID INT AUTO_INCREMENT PRIMARY KEY,
    Email_Address VARCHAR(255) NOT NULL UNIQUE,
    Password VARCHAR(60) NOT NULL,
    First_Name VARCHAR(60) NOT NULL,
    Last_Name VARCHAR(60) NOT NULL
);

CREATE TABLE `Addresses` (
    Address_ID INT AUTO_INCREMENT PRIMARY KEY,
    Line1 VARCHAR(60) NOT NULL,
    Line2 VARCHAR(60),
    City VARCHAR(40) NOT NULL,
    State VARCHAR(2) NOT NULL,
    Zip_Code VARCHAR(10) NOT NULL,
    Phone VARCHAR(12) NOT NULL,
    Customer_ID INT,
    FOREIGN KEY (Customer_ID) REFERENCES Members(Member_ID)
);

CREATE TABLE `Images` (
    IMG_ID INT AUTO_INCREMENT PRIMARY KEY,
    IMG_URL VARCHAR(255) NOT NULL
);

CREATE TABLE `Route` (
    Route_ID INT AUTO_INCREMENT PRIMARY KEY,
    Difficulty VARCHAR(10) NOT NULL,
    Route_Name VARCHAR(255) NOT NULL UNIQUE,
    Description TEXT NOT NULL,
    Tire_Tread VARCHAR(10) NOT NULL,
    Distance DECIMAL(10, 2) NOT NULL,
    Water_Access BOOLEAN NOT NULL
);

CREATE TABLE `Administrators` (
    Admin_ID INT AUTO_INCREMENT PRIMARY KEY,
    Email_Address VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    First_Name VARCHAR(255) NOT NULL,
    Last_Name VARCHAR(255) NOT NULL
);

INSERT INTO route (Difficulty, Route_Name, Description, Tire_Tread, Distance, Water_Access) VALUES
('Beginner', 'Lake Trail', 'Scenic trail around the lake.', 'Smooth', 3.5, true),('Intermediate', 'Forest Loop', 'Moderate difficulty loop trail through dense forest.', 'Moderate', 5.2, true),
('Advanced', 'Mountain Summit Trail', 'Challenging trail leading to a scenic mountain summit.', 'Rugged', 10.8, false),
('Expert', 'Rocky Ridge Trail', 'Difficult trail with rocky terrain and steep inclines.', 'Rocky', 8.7, false),
('Beginner', 'River Path', 'Easy path along the river with picnic spots.', 'Gravel', 2.0, true);




