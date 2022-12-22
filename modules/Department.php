<?php

require_once(__DIR__ . '/../db.php');

class Department
{
    public static function createDepartment($name)
    {
        $conn = DB::getConnection();
        $res = $conn->query("INSERT INTO department (name) VALUES ('$name')");

        if ($res === true) {
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