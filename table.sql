DROP DATABASE IF EXISTS jips;
CREATE DATABASE IF NOT EXISTS jips;
USE jips;

CREATE TABLE IF NOT EXISTS `admin` (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    passwordHash VARCHAR(255) NOT NULL,
    createdAt DATETIME(6) DEFAULT CURRENT_TIMESTAMP(6),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS `department` (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL UNIQUE,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS `lecturer` (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    employeeID VARCHAR(255) NOT NULL UNIQUE,
    passwordHash VARCHAR(255) NOT NULL,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    departmentID INT UNSIGNED,
    createdAt DATETIME(6) DEFAULT CURRENT_TIMESTAMP(6),
    PRIMARY KEY(id),
    FOREIGN KEY(departmentID) REFERENCES department(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS `course` (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    code VARCHAR(255) NOT NULL UNIQUE,
    title VARCHAR(255) NOT NULL UNIQUE,
    createdAt DATETIME(6) DEFAULT CURRENT_TIMESTAMP(6),
    updatedAt DATETIME(6) DEFAULT CURRENT_TIMESTAMP(6),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS `lecturerCourse` (
    lecturerID INT UNSIGNED NOT NULL,
    courseID INT UNSIGNED NOT NULL,
    createdAt DATETIME(6) DEFAULT CURRENT_TIMESTAMP(6),
    updatedAt DATETIME(6) DEFAULT CURRENT_TIMESTAMP(6),
    PRIMARY KEY(lecturerID, courseID),
    FOREIGN KEY(lecturerID) REFERENCES lecturer(id) ON DELETE CASCADE,
    FOREIGN KEY(courseID) REFERENCES course(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `lecture` (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    courseID INT UNSIGNED NOT NULL,
    startDateTime DATETIME(6) NOT NULL,
    endDateTime DATETIME(6) NOT NULL,
    createdAt DATETIME(6) DEFAULT CURRENT_TIMESTAMP(6),
    updatedAt DATETIME(6) DEFAULT CURRENT_TIMESTAMP(6),
    PRIMARY KEY(id),
    FOREIGN KEY(courseID) REFERENCES course(id) ON DELETE CASCADE
);