<?php
require_once('../../lib/layout.php');
require_once('../../modules/Lecture.php');

$title = 'View Lecture';
$style = "../../static/stylesheets/admin/view-lecture-info.css";

if (!isset($_GET['id'])) {
  header('location: /views/not-found.php');
}

$lectureID = $_GET['id'];
$lecture = Lecture::getLectureByID($lectureID);

function dayOption($value, $text)
{
  global $lecture;
  if ($value === $lecture['day']) {
    return "<option value='$value' selected>$text</option>";
  } else {
    return "<option value='$value'>$text</option>";
  }
}
?>


<div class="wrapper">
  <h1 id="form-title">View Lecture Info</h1>
  <div id="lecture-info" class="row">
    <div class="mb-3 col-md-2">
      <label for="course-code">Course Code</label>
      <input type="text" id="course-code" name="course-code" value="<?php echo $lecture['code']; ?>"
        class="form-control" disabled readonly>
    </div>

    <div class="mb-3 col-md-10">
      <label for="course-code">Course Title</label>
      <input type="text" id="course-code" name="course-code" value="<?php echo $lecture['title']; ?>"
        class="form-control" disabled readonly>
    </div>

    <div class="mb-3 col-md-12">
      <label for="day">Day</label>
      <select name="day" id="day" class="form-select" readonly disabled>
      <?php
        echo dayOption('monday', 'Monday');
        echo dayOption('tuesday', 'Tuesday');
        echo dayOption('wednesday', 'Wednesday');
        echo dayOption('thursday', 'Thursday');
        echo dayOption('friday', 'Friday');
        ?>
      </select>
    </div>

    <div class="mb-3 col-md-12">
      <label for="start-time">Start Time</label>
      <input type="time" id="start-time" name="startTime" class="form-control" required step="3600" min="09:00"
        max="17:00" value="<?php echo $lecture['startTime']; ?>" disabled readonly />
    </div>

    <div class="mb-3 col-md-12">
      <label for="end-time">End Time</label>
      <input type="time" id="end-time" name="endTime" class="form-control" required step="3600" min="10:00" max="18:00"
        value="<?php echo $lecture['endTime']; ?>" disabled readonly />
    </div>

    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6">
          <form method="GET" action="edit-lecture-info.php">
            <input type="text" name="id" value="<?php echo $lecture['id']; ?>" hidden>
            <button type="submit" class="btn btn-primary" id="edit-btn">Edit Info</button>
          </form>
        </div>
        <div class="col-md-6">
          <form method="POST" action="delete-lecture.php">
            <input type="text" name="id" value="<?php echo $lecture['id']; ?>" hidden>
            <button type="submit" class="btn btn-danger" id="delete-btn">Delete Lecture</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>