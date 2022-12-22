<?php

require_once(__DIR__ . '/../db.php');

class Course
{
    public static function createCourse($code, $title, $departmentID, $lecturerID)
    {
        $conn = DB::getConnection();
        $res = $conn->query("INSERT INTO course (code, title, departmentID) 
        VALUES ('$code', '$title', '$departmentID')");

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

    public static function assignLecturer($courseID, $lecturerID)
    {
        $conn = DB::getConnection();
        $res = $conn->query("INSERT INTO lecturerCourse (lecturerID, courseID)
        VALUES ('$lecturerID', '$courseID');");

        return $res === true;
    }

    public static function getAssignedLecturers($courseID)
    {
        $conn = DB::getConnection();
        $res = $conn->query("SELECT l.* FROM lecturerCourse lc 
        LEFT JOIN lecturer l ON lc.lecturerID = l.id");

        $result = [];
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                array_push($result, $row);
            }
        }
 
        return $result;
    }

    public static function getCourses()
    {
        $conn = DB::getConnection();
        $res = $conn->query("SELECT course.id AS id, code, title, departmentID, department.name AS departmentName 
        FROM course LEFT JOIN department ON course.departmentID = department.id");
        $result = [];
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                array_push($result, $row);
            }
        }

        return $result;
    }

    public static function getCourseByID($courseID)
    {
        $conn = DB::getConnection();
        $res = $conn->query("SELECT course.id AS id, code, title, departmentID, department.name AS departmentName 
        FROM course 
        LEFT JOIN department ON course.departmentID = department.id 
        WHERE code='$courseID'
        ");
        if ($res->num_rows > 0) {
            return $res->fetch_assoc();
        }
        return null;
    }

    public static function getCourseByCode($courseCode)
    {
        $conn = DB::getConnection();
        $res = $conn->query("SELECT course.id AS id, code, title, departmentID, department.name AS departmentName 
        FROM course 
        LEFT JOIN department ON course.departmentID = department.id 
        WHERE code='$courseCode'");

        if ($res->num_rows > 0) {
            return $res->fetch_assoc();
        }
        return null;
    }
}

?>