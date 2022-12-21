<?php
require_once('../lib/layout.php');
$style = "../static/stylesheets/add-lecture.css";
$lecturers = ["Lecturer 1", "Lecturer 2", "Lecturer 3", "Lecturer 4", "Lecturer 5"];
$courses = ["Course 1", "Course 2", "Course 3", "Course 4", "Course 5"];
?>


<h1 id="form-title">Add New Lecture</h1>
<form id="new-lecture-form">
  <div class="mb-3">
    <label for="lecturer">Course</label>
    <select class="form-select" name="lecturer" id="lecturer">
      <?php
      for ($i = 0; $i < sizeof($courses); $i++) {
        echo "<option value='lecturer.id'>{$courses[$i]}</option>";
      }
      ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="date">Date</label>
    <input type="date" id="date" class="form-control" />
  </div>

  <div class="mb-3">
    <label for="time">Time</label>
    <input type="time" id="time" class="form-control" />
  </div>

  <button type="submit" class="btn btn-success" id="submit-btn">Add Lecture</button>
</form>