USE jips;

INSERT INTO `admin` (username, passwordHash) VALUES ('superuser', 'superuser');

INSERT INTO `department` (name) VALUES ('Computer Science');
INSERT INTO `department` (name) VALUES ('Biology');
INSERT INTO `department` (name) VALUES ('Zoology');

INSERT INTO `course` (code, title, departmentID, level) VALUES ('CSC 433', 'Intro to programming', 1, 400);

INSERT INTO `lecturer` (employeeID, title, passwordHash, firstName, lastName, email, departmentID)
    VALUES (1010, 'Mr.', 'password', 'John', 'Doe', 'j@gmail.com', 1);
INSERT INTO `lecturer` (employeeID, title, passwordHash, firstName, lastName, email, departmentID)
    VALUES (1011, 'Mrs.', 'password', 'Ike', 'Are', 'i@gmail.com', 1);
    
    INSERT INTO `lecturerCourse` (lecturerID, courseID) VALUES (2, 1);

INSERT INTO `rescheduleRequest` (courseID, lecturerID, day, startTime, endTime)
VALUES (1, 2, "Monday", "now", "tomorrow");
