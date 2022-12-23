<?php
session_start();

require_once('../../modules/Lecturer.php');

$eid = $_POST['eid'];

$res = Lecturer::deleteLecturerByEmployeeID($code);
if ($res) {
    header('location: view-lecturers.php');
} else {
    header('location: .');
}
?>