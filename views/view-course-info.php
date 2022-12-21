<?php
require_once('../lib/layout.php');
$title = "Lecture Attendance System";
$style = "../static/stylesheets/view-course-info.css";
$course = [
  "course_id" => "Lect_ID",
  "course_code" => "Course Code",
  "course_title" => "Course Title",
  "assigned_lecturer" => "Assigned Lecturer",
];
?>


<?php include "layouts/header.php"; ?>

<div class="container">
  <div class="row h-100">
    <div class="col-2 aside">
      <?php include "layouts/side-bar.php" ?>
    </div>

    <div class="col-10 main-content">
      <h1 id="form-title">View Course Info</h1>
      <form id="course-info" class="row" method="POST" action="edit-course-info.php">
        <input type="text" name="course-id" value="<?php echo $course["course_id"] ?>" hidden>
        <div class="mb-3 col-md-12">
          <label for="course-code" class="form-label">Course Code</label>
          <input type="text" class="form-control" id="course-code" name="course-code" value="<?php echo $course["course_code"] ?>" disabled readonly>
        </div>

        <div class="mb-3 col-md-12">
          <label for="course-title" class="form-label">Course Title</label>
          <input type="text" class="form-control" id="course-title" name="course-title" value="<?php echo $course["course_title"] ?>" disabled readonly>
        </div>

        <div class="mb-3 col-md-12">
          <label for="assigned-lecturer" class="form-label">Assigned Lecturer</label>
          <input type="text" class="form-control" id="assigned-lecturer" name="assigned-lecturer" value="<?php echo $course["assigned_lecturer"] ?>" disabled readonly>
        </div>

        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <button type="submit" class="btn btn-primary" id="submit-btn">Edit Info</button>
            </div>
            <div class="col-md-6">
              <button type="submit" class="btn btn-danger" id="delete-btn">Delete Course</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="../static/scripts/view-course-info.js"></script>