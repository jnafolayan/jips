<?php

require_once(__DIR__ . '/../db.php');
require_once(__DIR__.'/Course.php');

class Lecture
{
    public static function createLecture($courseID, $day, $startTime, $endTime)
    {
        $conn = DB::getConnection();

        $course = Course::getCourseByID($courseID);
        $deptID = $course['departmentID'];
        $level = $course['level'];

        $existing = $conn->query("SELECT * FROM 
        (SELECT course.departmentID AS dID, course.level AS level FROM lecture 
        LEFT JOIN course ON lecture.courseID = course.id
        WHERE day='$day' AND startTime<='$startTime' AND endTime>='$endTime') AS ls
        WHERE ls.dID = '$deptID' AND ls.level = '$level'");
        if ($existing->num_rows > 0) {
            return null;
        }
        
        $res = $conn->query("INSERT INTO lecture (courseID, day, startTime, endTime) 
        VALUES ('$courseID', '$day', '$startTime', '$endTime')");

        if ($res === true) {
            $lectureID = $conn->insert_id;
            return $lectureID;
        }

        return null;
    }

    public static function getLecturesForLecturer($lecturerID)
    {
        $conn = DB::getConnection();
        $res = $conn->query("SELECT * FROM 
            (SELECT l.* FROM lecturerCourse lc 
            LEFT JOIN lecture l ON l.courseID = lc.courseID 
            WHERE lecturerID='$lecturerID' AND l.id IS NOT NULL) AS lectures
            LEFT JOIN course ON course.id = lectures.courseID");

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
    public static function getLecturerCourses($lecturerID)
    {
        $conn = DB::getConnection();
        $res = $conn->query("SELECT c.* FROM lecturerCourse lc 
        LEFT JOIN course c ON lc.courseID = c.id");

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