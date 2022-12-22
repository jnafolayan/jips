<?php
require_once('../../lib/layout.php');

$style = "../../static/stylesheets/admin/add-lecture.css";

require_once('../../modules/Course.php');
require_once('../../modules/Lecture.php');

$courses = Course::getCourses();
$submitError = null;

var_dump(Course::getLecturerCourses(1));

if (isset($_POST['submit'])) {
    $courseID = $_POST['courseID'];
    $day = $_POST['day'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];

    $result = Lecture::createLecture($courseID, $day, $startTime, $endTime);
    if ($result !== null) {
        header('location: view-lectures.php');
    } else {
        $submitError = 'Unable to add a new lecture due to time conflicts.';
    }
}
?>


<h1 id="form-title">Add New Lecture</h1>
<?php
if ($submitError) {
    echo "<p class='text-danger'>$submitError</p>";
}
?>
<form id="new-lecture-form" method="POST">
    <div class="mb-3">
        <label for="courseID">Course</label>
        <select class="form-select" name="courseID" id="courseID">
            <?php
            foreach ($courses as $course) {
                $id = $course["id"];
                $code = $course["code"];
                $title = $course["title"];
                $name = $code . ': ' . $title;
                echo "<option value='$id'>$name</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="day">Day</label>
        <select name="day" id="day" class="form-select">
            <option value="monday">Monday</option>
            <option value="tuesday">Tuesday</option>
            <option value="wednesday">Wednesday</option>
            <option value="thursday">Thursday</option>
            <option value="friday">Friday</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="start-time">Start Time</label>
        <input type="time" id="start-time" name="startTime" class="form-control" required step="3600" min="09:00"
            max="17:00" />
    </div>

    <div class="mb-3">
        <label for="end-time">End Time</label>
        <input type="time" id="end-time" name="endTime" class="form-control" required step="3600" min="10:00"
            max="18:00" />
    </div>

    <input type="submit" name="submit" class="btn btn-success" id="submit-btn" value="Add Lecture" />
</form>