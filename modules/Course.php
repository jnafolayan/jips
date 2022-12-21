<?php

require_once(__DIR__ . '/../db.php');

class Course
{
    public static function createCourse($code, $title, $lecturerID)
    {
        $conn = DB::getConnection();
        $res = $conn->query("INSERT INTO course (code, title) 
        VALUES ('$code', '$title', '$lecturerID')");

        if ($res === true) {
            $courseID = $conn->insert_id;
            if (isset($lecturerID)) {
                // ignore result because if it fails, the user should
                // just retry
                Course::registerLecturer($courseID, $lecturerID);
            }
            return $courseID;
        }

        return null;
    }

    public static function registerLecturer($courseID, $lecturerID)
    {
        $conn = DB::getConnection();
        $res = $conn->query("INSERT INTO lecturerCourse (lecturerID, courseID)
        VALUES ('$lecturerID', '$courseID');");

        return $res === true;
    }

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