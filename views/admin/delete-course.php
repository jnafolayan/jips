<?php
session_start();

require_once('../../modules/Course.php');

$code = $_POST['code'];
$res = Course::deleteCourseByCode($code);
if ($res) {
    header('location: view-courses.php');
} else {
    header('location: .');
}
?>