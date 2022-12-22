<?php
session_start();

require_once('../../lib/layout.php');
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
    <label for="level">Level</label>
    <select name="level" id="level" class="form-select">
        <option value="100">100</option>
        <option value="200">200</option>
        <option value="300">300</option>
        <option value="400">400</option>
        <option value="500">500</option>
    </select>
    </div>

    <div class="mb-3">
        <label for="lecturers">Assigned Lecturers</label>
        <select class="form-select" name="lecturers[]" id="lecturers" multiple>
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