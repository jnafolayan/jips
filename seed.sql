USE jips;

INSERT INTO `admin` (username, passwordHash) VALUES ('superuser', 'superuser');

INSERT INTO `department` (name) VALUES ('Computer Science');
INSERT INTO `department` (name) VALUES ('Biology');
INSERT INTO `department` (name) VALUES ('Zoology');

INSERT INTO `course` (code, title, departmentID) VALUES ('CSC 433', 'Intro to programming', 1);

INSERT INTO `lecturer` (employeeID, passwordHash, firstName, lastName, email, departmentID)
    VALUES (1010, 'password', 'John', 'Doe', 'j@gmail.com', 1);
INSERT INTO `lecturer` (employeeID, passwordHash, firstName, lastName, email, departmentID)
    VALUES (1011, 'password', 'Ike', 'Are', 'i@gmail.com', 1);