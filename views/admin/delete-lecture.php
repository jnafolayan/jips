<?php
session_start();

require_once('../../modules/Lecture.php');

$id = $_POST['id'];
$res = Lecture::deleteLectureByID($id);
if ($res) {
    header('location: view-lectures.php');
} else {
    header('location: .');
}
?>