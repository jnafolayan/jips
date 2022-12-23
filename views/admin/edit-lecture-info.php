<?php
require_once('../../lib/layout.php');
require_once('../../modules/Lecture.php');

$title = 'Edit Lecture';
$style = "../../static/stylesheets/admin/edit-lecture-info.css";

if (!isset($_GET['id'])) {
  header('location: /views/not-found.php');
}

$lectureID = $_GET['id'];
$lecture = Lecture::getLectureByID($lectureID);
$submitError = null;

if (isset($_POST['submit'])) {
  $day = $_POST['day'];
  $startTime = $_POST['startTime'];
  $endTime = $_POST['endTime'];

  $res = Lecture::updateLectureByID($lectureID, $day, $startTime, $endTime);
  if ($res) {
    header('location: view-lectures.php');
  } else {
    $submitError = 'Unable to update lecture';
  }
}

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
  <h1 id="form-title">Edit Lecture Info</h1>
  <?php
  if ($submitError) {
    echo "<p class='text-danger'>$submitError</p>";
  }
  ?>
  <form id="lecture-info" method="POST" class="row p-0">
    <div class="mb-3 col-md-2">
      <label for="courseCode">Course Code</label>
      <input type="text" id="courseCode" name="courseCode" value="<?php echo $lecture['code']; ?>" class="form-control"
        disabled readonly>
    </div>

    <div class="mb-3 col-md-10">
      <label for="courseTitle">Course Title</label>
      <input type="text" id="courseTitle" name="courseTitle" value="<?php echo $lecture['title']; ?>"
        class="form-control" disabled readonly>
    </div>

    <div class="mb-3 col-md-12">
      <label for="day">Day</label>
      <select name="day" id="day" class="form-select">
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
        max="17:00" value="<?php echo $lecture['startTime']; ?>" />
    </div>

    <div class="mb-3 col-md-12">
      <label for="end-time">End Time</label>
      <input type="time" id="end-time" name="endTime" class="form-control" required step="3600" min="10:00" max="18:00"
        value="<?php echo $lecture['endTime']; ?>" />
    </div>

    <div class="col-md-12">
      <input type="submit" name="submit" class="btn btn-success" id="edit-btn" value="Update Info" />
    </div>
  </form>
</div>