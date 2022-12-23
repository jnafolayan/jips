<?php

require_once(__DIR__ . '/../db.php');

class Attendance
{
    public static function getAttendanceForLecture($lectureID)
    {
        $conn = DB::getConnection();
        $res = $conn->query("SELECT * FROM attendance 
        LEFT JOIN lecture ON attendance.lectureID = lecture.id 
        WHERE lectureID='$lectureID'");

        $result = [];
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                array_push($result, $row);
            }
        }

        return $result;
    }

    public static function takeAttendanceForLecture($lectureID, $matricNumber)
    {
        $conn = DB::getConnection();
        $res = $conn->query("INSERT INTO attendance (lectureID, matricNumber) 
        VALUES ('$lectureID', '$matricNumber')");

        return $res;
    }
}

?>