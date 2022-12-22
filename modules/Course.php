<?php

require_once(__DIR__ . '/../db.php');

class Course
{
    public static function createCourse($code, $title, $departmentID, $level, $lecturerIDs)
    {
        $conn = DB::getConnection();
        $res = $conn->query("INSERT INTO course (code, title, departmentID, level) 
        VALUES ('$code', '$title', '$departmentID', '$level')");

        if ($res === true) {
            $courseID = $conn->insert_id;
            if (isset($lecturerIDs)) {
                // ignore result because if it fails, the user should
                // just retry
                Course::assignLecturers($courseID, $lecturerIDs);
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
        LEFT JOIN lecturer l ON lc.lecturerID = l.id
        WHERE lc.courseID = '$courseID'");

        $result = [];
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                array_push($result, $row);
            }
        }
 
        return $result;
    }

    /**
     * Get courses for the lecturer identified by $lecturerID
     * @param string $lecturerID
     * @return array
     */
    public static function getLecturerCourses($lecturerID) {
        $conn = DB::getConnection();
        $res = $conn->query("SELECT c.* FROM lecturerCourse lc 
        LEFT JOIN course c ON lc.courseID = c.id
        WHERE lc.lecturerID = '$lecturerID'");

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
        $res = $conn->query("SELECT course.id AS id, code, title, departmentID, level, department.name AS departmentName 
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
        $res = $conn->query("SELECT course.id AS id, code, title, departmentID, level, department.name AS departmentName 
        FROM course 
        LEFT JOIN department ON course.departmentID = department.id 
        WHERE course.id='$courseID'
        ");
        if ($res->num_rows > 0) {
            return $res->fetch_assoc();
        }
        return null;
    }

    public static function getCourseByCode($courseCode)
    {
        $conn = DB::getConnection();
        $res = $conn->query("SELECT course.id AS id, code, title, departmentID, level, department.name AS departmentName 
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