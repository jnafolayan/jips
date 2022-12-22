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
                Course::assignLecturers($courseID, [$lecturerID]);
            }
            return $courseID;
        }

        return null;
    }

    public static function deleteCourse($courseID)
    {
        $conn = DB::getConnection();
        $sql = "DELETE FROM course WHERE id='$courseID'";
        $res = $conn->query($sql);

        return $res === true;
    }

    public static function deleteCourseByCode($code)
    {
        $conn = DB::getConnection();
        $sql = "DELETE FROM course WHERE code='$code'";
        $res = $conn->query($sql);

        return $res === true;
    }

    public static function assignLecturers($courseID, $lecturerIDs)
    {
        $conn = DB::getConnection();
        $sql = "";
        foreach ($lecturerIDs as $id) {
            $sql .= "INSERT INTO lecturerCourse (lecturerID, courseID)
            VALUES ('$id', '$courseID');";
        }
        $res = $conn->multi_query($sql);

        return $res === true;
    }

    public static function removeAssignedLecturers($courseID)
    {
        $conn = DB::getConnection();
        $sql = "DELETE FROM lecturerCourse WHERE courseID='$courseID'";
        $res = $conn->query($sql);

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