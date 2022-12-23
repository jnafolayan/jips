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

    public static function updateLectureByID($lectureID, $day, $startTime, $endTime)
    {
        $conn = DB::getConnection();
        $res = $conn->query("UPDATE lecture SET day='$day', startTime='$startTime', endTime='$endTime' 
        WHERE id='$lectureID'");
        return $res;
    }

    public static function deleteLectureByID($lectureID)
    {
        $conn = DB::getConnection();
        $res = $conn->query("DELETE FROM lecture WHERE id='$lectureID'");
        return $res;
    }

    public static function getLectureByID($lectureID)
    {
        $conn = DB::getConnection();
        $res = $conn->query("SELECT c.*, l.* FROM lecture l 
        LEFT JOIN course c ON l.courseID = c.id 
        WHERE l.id='$lectureID'");

        if ($res->num_rows > 0) {
            return $res->fetch_assoc();
        }

        return null;
    }

    public static function getLectureByCourseID($courseID)
    {
        $conn = DB::getConnection();
        $res = $conn->query("SELECT l.id AS id, l.*, c.* FROM lecture l 
        LEFT JOIN course c ON l.courseID = c.id 
        WHERE l.courseID='$courseID'");

        if ($res->num_rows > 0) {
            return $res->fetch_assoc();
        }

        return null;
    }

    public static function getLecturesForLecturer($lecturerID)
    {
        $conn = DB::getConnection();
        $res = $conn->query("SELECT course.*, lecture.* FROM 
            (SELECT l.* FROM lecturerCourse lc 
            LEFT JOIN lecture l ON lc.courseID = l.courseID 
            WHERE lc.lecturerID='$lecturerID' AND l.id IS NOT NULL) AS lecture
            LEFT JOIN course ON lecture.courseID = course.id");

        $result = [];
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                array_push($result, $row);
            }
        }

        return $result;
    }

    public static function getLectures()
    {
        $conn = DB::getConnection();
        $res = $conn->query("SELECT c.*, l.* FROM lecture l LEFT JOIN course c ON l.courseID = c.id");

        $result = [];
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                array_push($result, $row);
            }
        }

        return $result;
    }

    public static function startLecture($lectureID)
    {
        $conn = DB::getConnection();
        $res = $conn->query("UPDATE lecture SET status='started' WHERE id='$lectureID' AND status='pending'");
        return $res;
    }

    public static function endLecture($lectureID)
    {
        $conn = DB::getConnection();
        $res = $conn->query("UPDATE lecture SET status='ended' WHERE id='$lectureID' AND status='started'");
        return $res;
    }
}

?>