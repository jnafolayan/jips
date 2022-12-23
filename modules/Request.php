<?php

require_once(__DIR__ . '/../db.php');


class Request
{
    public static function createRequest($lectureID, $newDay, $newStartTime, $newEndTime)
    {
        $conn = DB::getConnection();

        $lecture = Lecture::getLectureByID($lectureID);
        $courseID = $lecture["courseID"];
        // $lecturerID = $lecture


        $res = $conn->query("INSERT INTO rescheduleRequest (courseID, day, startTime, endTime) 
        VALUES ('$courseID', '$newDay', '$newStartTime', '$newEndTime')");

        if ($res === true) {
            $lectureID = $conn->insert_id;
            return $lectureID;
        }

        return null;
    }


    public static function getRescheduleRequests()
    {
        $conn = DB::getConnection();
        // $res = $conn->query("SELECT rr.courseID AS id, code, title, departmentID, level, department.name AS departmentName 
        // FROM rescheduleRequest AS rr LEFT JOIN lecturer ON rr.departmentID = department.id");
        // $lecture = lecture::getLectureByID($lectureID);
        // $courseID = $lecture["courseID"];

        // $sql = $conn->query("SELECT lecturerID, courseID FROM lecturerCourse WHERE courseID=$courseID")

        $res = $conn->query("SELECT * FROM rescheduleRequest");
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