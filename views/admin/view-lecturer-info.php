<?php
require_once('../../lib/layout.php');
$style = "../../static/stylesheets/admin/view-lecturer-info.css";
$script = "../static/scripts/view-lecturer-info.js";

require_once('../../modules/Course.php');
require_once('../../modules/Lecturer.php');

if (!isset($_GET['eid'])) {
  header('location: view-lecturers.php');
}

$lecturer = Lecturer::getLecturerByEmployeeID($_GET['eid']);
if ($lecturer === false) {
  header('location: /views/not-found.php');
}

$assignedCourses = Course::getLecturerCourses($lecturer['id']);
$courseNames = [];
foreach ($assignedCourses as $course) {
  array_push($courseNames, $course['code']);
}
$courseNamesString = implode(', ', $courseNames);
?>


<div class="wrapper">
  <h1 id="form-title">View Lecturer Info</h1>

  <div id="lecturer-info" class="row">
    <div class="mb-3 col-md-2">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" value="<?php echo $lecturer["title"] ?>" disabled readonly>
    </div>

    <div class="mb-3 col-md-5">
      <label for="lastName" class="form-label">Lastname</label>
      <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lecturer["lastName"] ?>"
        disabled readonly>
    </div>

    <div class="mb-3 col-md-5">
      <label for="firstName" class="form-label">Firstname</label>
      <input type="text" class="form-control" id="firstName" name="firstName"
        value="<?php echo $lecturer["firstName"] ?>" disabled readonly>
    </div>

    <div class="mb-3 col-md-12">
      <label for="department" class="form-label">Department</label>
      <input type="text" class="form-control" id="department" name="department"
        value="<?php echo $lecturer["departmentName"] ?>" disabled readonly>
    </div>

    <div class="mb-3 col-md-12">
      <label for="course">Course</label>
      <input type="text" class="form-control" id="course" name="course" value="<?php echo $courseNamesString; ?>"
        disabled readonly>
    </div>

    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6">
          <form method="GET" action="edit-lecturer-info.php">
            <input type="text" name="eid" value="<?php echo $lecturer["employeeID"]; ?>" hidden>
            <button type="submit" class="btn btn-primary" id="submit-btn">Edit Info</button>
          </form>
        </div>
        <div class="col-md-6">
          <form method="POST" action="delete-lecturer.php">
            <input type="text" name="eid" value="<?php echo $lecturer["employeeID"]; ?>" hidden>
            <button type="button" class="btn btn-danger" id="delete-btn">Delete Info</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>