<?php
require_once('../lib/layout.php');
$style = "../static/stylesheets/edit-course-info.css";
$lecturers = ["Lecturer 1", "Lecturer 2", "Lecturer 3", "Lecturer 4", "Lecturer 5"];
$course = [
  "id" => "Lect_ID",
  "course_code" => "Course Code",
  "course_title" => "Course Title",
  "assigned_lecturer" => "Assigned Lecturer",
];

// Functionality to be executed after a form is submitted
if (isset($_POST["submit"])) {
  null;
}
?>


<h1 id="form-title">Edit Course Info</h1>
<form id="course-info" class="row" method="POST" action="/<?php echo $course["id"]; ?>/edit-info.php">
  <div class="mb-3 col-md-12">
    <label for="course-code" class="form-label">Course Code</label>
    <input type="text" class="form-control" id="course-code" name="course-code" value="<?php echo $course["course_code"] ?>">
  </div>

  <div class="mb-3 col-md-12">
    <label for="course-title" class="form-label">Course Title</label>
    <input type="text" class="form-control" id="course-title" name="course-title" value="<?php echo $course["course_title"] ?>">
  </div>

  <div class="mb-3 col-md-12">
    <label for="assigned-lecturer" class="form-label">Assigned Lecturer</label>
    <select class="form-select" name="lecturer" id="lecturer">
      <?php
      for ($i = 0; $i < sizeof($lecturers); $i++) {
        echo "<option value='lecturer.id'>{$lecturers[$i]}</option>";
      }
      ?>
    </select>
  </div>

  <div class="col-md-12">
    <button type="submit" class="btn btn-success" id="update-btn">Update Info</button>
  </div>
</form>