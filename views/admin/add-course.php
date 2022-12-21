<?php
session_start();

require_once('../lib/layout.php');
require_once('../modules/Department.php');
require_once('../modules/Lecturer.php');
require_once('../modules/Course.php');

$title = "Lecture Attendance System";
$style = "../static/stylesheets/add-course.css";

$lecturers = Lecturer::getLecturers();
$departments = Department::getDepartments();

$submitError = null;

if (isset($_POST["submit"])) {
  $courseCode = $_POST["courseCode"];
  $courseTitle = $_POST["courseTitle"];
  $departmentID = $_POST["department"];
  $lecturerID = $_POST["lecturer"];

  $result = Course::createCourse($courseCode, $courseTitle, $departmentID, $lecturerID);
  if ($result != null) {
    header('location:view-courses.php');
  } else {
    $submitError = 'Unable to create a course.';
  }
}
?>


<h1 id="form-title">Add New Course</h1>
<?php
if ($submitError) {
  echo "<p class='text-danger'>$submitError</p>";
}
?>
<form id="new-course-form" method="POST" action="">
  <div class="mb-3">
    <label for="course-code" class="form-label">Course Code</label>
    <input type="text" class="form-control" id="course-code" name="courseCode" required>
  </div>

  <div class="mb-3">
    <label for="course-title" class="form-label">Course Title</label>
    <input type="text" class="form-control" id="course-title" name="courseTitle" required>
  </div>

  <div class="mb-3">
    <label for="department">Department</label>
    <select class="form-select" name="department" id="department" required>
      <option value="" selected> Select an option</option>
      <?php
      foreach ($departments as $dept) {
        $id = $dept['id'];
        $name = $dept['name'];
        echo "<option value='$id'>$name</option>";
      }
      ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="lecturer">Assigned Lecturer</label>
    <select class="form-select" name="lecturer" id="lecturer">
      <option value="" selected> Select an option</option>
      <?php
      foreach ($lecturers as $lecturer) {
        $id = $lecturer['id'];
        $fullName = $lecturer['firstName'] . ' ' . $lecturer['lastName'];
        echo "<option value='$id'>$fullName</option>";
      }
      ?>
    </select>
  </div>

  <input type="submit" name="submit" class="btn btn-success" id="submit-btn" value="Add Course" />
</form>