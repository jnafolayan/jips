<?php
session_start();
require_once('../../lib/layout.php');
$title = 'View Course';
$style = "../../static/stylesheets/admin/view-course-info.css";
$script = "../static/scripts/view-course-info.js";

require_once('../../modules/Course.php');
require_once('../../modules/Department.php');

$code = isset($_GET['code']) ? $_GET['code'] : null;
$course = Course::getCourseByCode($code);
if (!$course) {
  header('location: not-found.php');
}

$departments = Department::getDepartments();
$lecturers = Course::getAssignedLecturers($course['id']);
$lecturerNames = [];
foreach ($lecturers as $l) {
  array_push($lecturerNames, $l['firstName'] . ' ' . $l['lastName']);
}

$levels = ['100', '200', '300', '400', '500'];
?>


<div class="wrapper">
  <h1 id="form-title">View Course Info</h1>
  <div id="course-info" class="row">
    <div class="mb-3 col-md-12">
      <label for="course-code" class="form-label">Course Code</label>
      <input type="text" class="form-control" id="course-code" name="course-code" value="<?php echo $course["code"] ?>"
        disabled readonly>
    </div>

    <div class="mb-3 col-md-12">
      <label for="course-title" class="form-label">Course Title</label>
      <input type="text" class="form-control" id="course-title" name="course-title"
        value="<?php echo $course["title"] ?>" disabled readonly>
    </div>

    <div class="mb-3">
      <label for="department">Department</label>
      <select class="form-select" name="department" id="department" disabled required>
        <?php
        foreach ($departments as $dept) {
          $id = $dept['id'];
          $name = $dept['name'];
          $selected = $id === $course['departmentID'];
          echo $selected ? "<option value='$id' selected>$name</option>" : "<option value='$id'>$name</option>";
        }
        ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="level">Level</label>
      <select name="level" id="level" class="form-select" value="<?php echo $course['level']; ?>" readonly disabled>
        <?php
        foreach ($levels as $level) {
          $selected = $level === $course['level'];
          echo $selected ? "<option value='$level' selected>$level</option>" : "<option value='$level'>$level</option>";
        }
        ?>
      </select>
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
    <<<<<<< HEAD </div>
  </div>
  =======
</div>
>>>>>>> ceb039274111f1d2a58c1fc78c881c76cfce9916