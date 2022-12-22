<?php
session_start();
require_once('../../lib/layout.php');
$style = "../../static/stylesheets/admin/view-course-info.css";
$script = "../static/scripts/view-course-info.js";

require_once('../../modules/Course.php');

$code = isset($_GET['code']) ? $_GET['code'] : null;
$course = Course::getCourseByCode($code);
if (!$course) {
  header('location: not-found.php');
}

$lecturers = Course::getAssignedLecturers($course['id']);
$lecturerNames = [];
foreach ($lecturers as $l) {
  array_push($lecturerNames, $l['firstName'] . ' ' . $l['lastName']);
}
?>


<h1 id="form-title">View Course Info</h1>
<div id="course-info" class="row">
  <div class="mb-3 col-md-12">
    <label for="course-code" class="form-label">Course Code</label>
    <input type="text" class="form-control" id="course-code" name="course-code" value="<?php echo $course["code"] ?>"
      disabled readonly>
  </div>

  <div class="mb-3 col-md-12">
    <label for="course-title" class="form-label">Course Title</label>
    <input type="text" class="form-control" id="course-title" name="course-title" value="<?php echo $course["title"] ?>"
      disabled readonly>
  </div>

  <div class="mb-3 col-md-12">
    <label for="assigned-lecturer" class="form-label">Assigned Lecturers</label>
    <input type="text" class="form-control" id="assigned-lecturer" name="assigned-lecturer"
      value="<?php echo implode(", ", $lecturerNames) ?>" disabled readonly>
  </div>

  <div class="col-md-12">
    <div class="row">
      <div class="col-md-6">
        <form method="GET" action="edit-course-info.php">
          <input type="text" name="code" value="<?php echo $course["code"] ?>" hidden>
          <button type="submit" class="btn btn-primary" id="submit-btn">Edit Info</button>
        </form>
      </div>
      <div class="col-md-6">
        <form method="POST" action="delete-course.php">
          <input type="text" name="code" value="<?php echo $course["code"] ?>" hidden>
          <button type="submit" class="btn btn-danger" id="delete-btn">Delete Course</button>
        </form>
      </div>
    </div>
  </div>
  </form>