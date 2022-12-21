USE jips;

INSERT INTO `admin` (username, passwordHash) VALUES ('superuser', 'superuser');

INSERT INTO `department` (name) VALUES ('Computer Science');

INSERT INTO `lecturer` (employeeID, passwordHash, firstName, lastName, email, departmentID)
    VALUES (1010, 'password', 'John', 'Are', 'j@gmail.com', 1);