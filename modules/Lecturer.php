<?php

require_once(__DIR__ . '/../db.php');

class Lecturer
{
    public static function createLecturer($employeeID, $title, $firstName, $lastName, $departmentID)
    {
        $passwordHash = strtolower($lastName);

        $conn = DB::getConnection();
        $res = $conn->query("INSERT INTO lecturer (employeeID, title, passwordHash, firstName, lastName, departmentID) 
        VALUES ('$employeeID', '$title', '$passwordHash', '$firstName', '$lastName', '$departmentID')");

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
        $res = $conn->query("SELECT l.*, d.name AS departmentName FROM lecturer l 
        LEFT JOIN department d ON l.departmentID = d.id WHERE employeeID='$eid'");
        if ($res->num_rows > 0) {
            return $res->fetch_assoc();
        }
        return null;
    }

    public static function updateLecturerByEmployeeID($employeeID, $title, $firstName, $lastName, $departmentID)
    {
        $conn = DB::getConnection();
        $res = $conn->query("UPDATE lecturer SET title='$title', firstName='$firstName', lastName='$lastName', departmentID='$departmentID' 
        WHERE employeeID='$employeeID'");

        return $res;
    }

    public static function deleteLecturerByEmployeeID($eid)
    {
        $conn = DB::getConnection();
        $sql = "DELETE FROM lecturer WHERE employeeID='$eid'";
        $res = $conn->query($sql);

        return $res;
    }
}

?>