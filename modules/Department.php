<?php

require_once(__DIR__ . '/../db.php');
require_once(__DIR__.'/Lecturer.php');

class Department
{
    public static function createDepartment($name, $hodLecturerID)
    {
        $conn = DB::getConnection();
        $res = $conn->query("INSERT INTO department (name) VALUES ('$name')");

        if ($res === true) {
            Lecturer::makeLecturerHOD($hodLecturerID);
            return $conn->insert_id;
        }

        return false;
    }

    public static function getDepartments()
    {
        $conn = DB::getConnection();
        $res = $conn->query("SELECT * FROM department");
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