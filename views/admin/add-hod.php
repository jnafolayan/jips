<?php
require_once('../../lib/layout.php');
require_once('../../lib/protect.php');
require_once('../../modules/Department.php');
require_once('../../modules/Lecturer.php');
require_once('../../modules/Course.php');

$title = "Lecture Attendance System";
$style = "../../static/stylesheets/admin/add-course.css";

$lecturers = Lecturer::getLecturers();
$departments = Department::getDepartments();

$submitError = null;

if (isset($_POST["submit"])) {
  $courseCode = $_POST["courseCode"];
  $courseTitle = $_POST["courseTitle"];
  $departmentID = $_POST["department"];
  $level = $_POST["level"];
  $lecturerIDs = $_POST["lecturers"];

  $result = Course::createCourse($courseCode, $courseTitle, $departmentID, $level, $lecturerIDs);
  if ($result != null) {
    header('location:view-courses.php');
  } else {
    $submitError = 'Unable to create course.';
  }
}
?>


<div class="wrapper">
  <select name="lecturer" id="">
    <?php
foreach($lecturers as $lecturer){
    echo "<option value="$lecturer["></option>";
    
}
    ?>
  </select>
    <input type="submit" name="submit" class="btn btn-success" id="submit-btn" value="Add Course" />
  </form>
</div>