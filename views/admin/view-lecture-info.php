<?php
require_once('../../lib/layout.php');

$style = "../../static/stylesheets/admin/view-lecture-info.css";
?>


<div class="wrapper">
  <h1 id="form-title">View Lecture Info</h1>
  <?php
  if ($submitError) {
    echo "<p class='text-danger'>$submitError</p>";
  }
  ?>
  <div id="lecture-info" class="row">
    <div class="mb-3 col-md-2">
      <label for="course-code">Course Code</label>
      <input type="text" id="course-code" name="course-code" value="Course Code" class="form-control" disabled readonly>
    </div>

    <div class="mb-3 col-md-10">
      <label for="course-code">Course Title</label>
      <input type="text" id="course-code" name="course-code" value="Course Title" class="form-control" disabled readonly>
    </div>

    <div class="mb-3 col-md-12">
      <label for="day">Day</label>
      <input type="text" id="day" name="day" value="day" class="form-control" disabled readonly>
    </div>

    <div class="mb-3 col-md-12">
      <label for="start-time">Start Time</label>
      <input type="time" id="start-time" name="startTime" class="form-control" required step="3600" min="09:00" max="17:00" disabled readonly />
    </div>

    <div class="mb-3 col-md-12">
      <label for="end-time">End Time</label>
      <input type="time" id="end-time" name="endTime" class="form-control" required step="3600" min="10:00" max="18:00" disabled readonly />
    </div>

    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6">
          <form method="POST" action="edit-lecture-info.php">
            <input type="text" name="code" value="" hidden>
            <button type="submit" class="btn btn-primary" id="edit-btn">Edit Info</button>
          </form>
        </div>
        <div class="col-md-6">
          <form method="POST" action="delete-lecture.php">
            <input type="text" name="code" value="" hidden>
            <button type="submit" class="btn btn-danger" id="delete-btn">Delete Lecture</button>
          </form>
        </div>
      </div>
    </div>
  </div>