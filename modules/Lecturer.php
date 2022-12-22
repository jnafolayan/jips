<?php

require_once(__DIR__ . '/../db.php');

class Lecturer
{
    public static function createLecturer($employeeID, $firstName, $lastName, $email)
    {
        $passwordHash = strtolower($lastName);

        $conn = DB::getConnection();
        $res = $conn->query("INSERT INTO lecturer (employeeID, passwordHash, firstName, lastName, email) 
        VALUES ('$employeeID', '$passwordHash', '$firstName', '$lastName', '$email')");

        if ($res === true) {
            return $conn->insert_id;
        }

        return false;
    }

    public static function getLecturers()
    {
        $conn = DB::getConnection();
        $res = $conn->query("SELECT l.*, d.name AS departmentName FROM lecturer l 
            LEFT JOIN department d ON l.departmentID = d.id");
        $result = [];
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                array_push($result, $row);
            }
        }

        return $result;
    }

    public static function getLecturerByEmployeeID($eid)
    {
        $conn = DB::getConnection();
        $res = $conn->query("SELECT * FROM lecturer WHERE employeeID='$eid'");
        $result = [];
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                array_push($result, $row);
            }
        }
        return $result;
    }
}

?>