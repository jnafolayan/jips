<?php
require_once('../lib/layout.php');
$style = "../static/stylesheets/add-course.css";
$lecturers = ["Lecturer 1", "Lecturer 2", "Lecturer 3", "Lecturer 4", "Lecturer 5"];
?>


<h1 id="form-title">Add New Course</h1>
<form id="new-course-form">
  <div class="mb-3">
    <label for="course-code" class="form-label">Course Code</label>
    <input type="text" class="form-control" id="course-code" name="course-code">
  </div>

  <div class="mb-3">
    <label for="course-title" class="form-label">Course Title</label>
    <input type="text" class="form-control" id="course-title" name="course-title">
  </div>

  <div class="mb-3">
    <label for="lecturer">Assigned Lecturer</label>
    <select class="form-select" name="lecturer" id="lecturer">
      <?php
      for ($i = 0; $i < sizeof($lecturers); $i++) {
        echo "<option value='lecturer.id'>{$lecturers[$i]}</option>";
      }
      ?>
    </select>
  </div>

  <button type="submit" class="btn btn-success" id="submit-btn">Add Course</button>
</form>