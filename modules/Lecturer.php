<?php

require_once(__DIR__ . '/../db.php');

class Lecturer
{
    public static function getLecturers()
    {
        $conn = DB::getConnection();
        $res = $conn->query("SELECT * FROM lecturer");
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