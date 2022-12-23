<?php
require_once('../../lib/layout.php');

$style = "../../static/stylesheets/admin/edit-lecture-info.css";
?>


<div class="wrapper">
  <h1 id="form-title">Edit Lecture Info</h1>
  <?php
  if ($submitError) {
    echo "<p class='text-danger'>$submitError</p>";
  }
  ?>
  <form id="lecture-info" method="POST" class="row p-0">
    <div class="mb-3 col-md-2">
      <label for="course-code">Course Code</label>
      <input type="text" id="course-code" name="course-code" value="Course Code" class="form-control">
    </div>

    <div class="mb-3 col-md-10">
      <label for="course-code">Course Title</label>
      <input type="text" id="course-code" name="course-code" value="Course Title" class="form-control">
    </div>

    <div class="mb-3 col-md-12">
      <label for="day">Day</label>
      <input type="text" id="day" name="day" value="day" class="form-control">
    </div>

    <div class="mb-3 col-md-12">
      <label for="start-time">Start Time</label>
      <input type="time" id="start-time" name="startTime" class="form-control" required step="3600" min="09:00" max="17:00" />
    </div>

    <div class="mb-3 col-md-12">
      <label for="end-time">End Time</label>
      <input type="time" id="end-time" name="endTime" class="form-control" required step="3600" min="10:00" max="18:00" />
    </div>


    <div class="col-md-12">
      <button type="submit" class="btn btn-success" id="edit-btn">Update Info</button>
    </div>

  </form>
</div>