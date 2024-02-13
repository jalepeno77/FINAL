CREATE DATABASE IF NOT EXISTS finaltest;

USE finaltest;

CREATE TABLE Members (
    Member_ID INT AUTO_INCREMENT PRIMARY KEY,
    Email_Address VARCHAR(255) NOT NULL UNIQUE,
    Password VARCHAR(60) NOT NULL,
    First_Name VARCHAR(60) NOT NULL,
    Last_Name VARCHAR(60) NOT NULL
);

CREATE TABLE Addresses (
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

CREATE TABLE `API` (
    API_ID INT AUTO_INCREMENT PRIMARY KEY,
    Endpoint_URL VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE `Images` (
    IMG_ID INT AUTO_INCREMENT PRIMARY KEY,
    IMG_URL VARCHAR(255) NOT NULL
);

CREATE TABLE `Route` (
    Route_ID INT AUTO_INCREMENT PRIMARY KEY,
    Difficulty VARCHAR(10) NOT NULL UNIQUE,
    Route_Name VARCHAR(255) NOT NULL UNIQUE,
    Description TEXT NOT NULL,
    Tire_Tread VARCHAR(10) NOT NULL,
    Distance DECIMAL(10, 2) NOT NULL,
    Date_Added DATETIME,
    Water_Access BOOLEAN NOT NULL,
    API_ID INT,
    IMG_ID INT,
    FOREIGN KEY (API_ID) REFERENCES API(API_ID),
    FOREIGN KEY (IMG_ID) REFERENCES Images(IMG_ID)
);

CREATE TABLE `Administrators` (
    Admin_ID INT AUTO_INCREMENT PRIMARY KEY,
    Email_Address VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    First_Name VARCHAR(255) NOT NULL,
    Last_Name VARCHAR(255) NOT NULL
);