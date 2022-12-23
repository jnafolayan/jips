<?php

require_once(__DIR__ . '/../db.php');


class Request
{
    public static function createRequest($courseID, $newDay, $newStartTime, $newEndTime)
    {
        $conn = DB::getConnection();

        

        $res = $conn->query("INSERT INTO rescheduleRequest (code, title, departmentID, level) 
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
}


?>