<?php
require_once('../../lib/layout.php');
$style = "../../static/stylesheets/admin/edit-course-info.css";

require_once('../../modules/Course.php');
require_once('../../modules/Lecturer.php');

$code = isset($_GET['code']) ? $_GET['code'] : null;
$course = Course::getCourseByCode($code);
if (!$course) {
    header('location: not-found.php');
}

$courseID = $course["id"];
$allLecturers = Lecturer::getLecturers();

$assignedLecturers = Course::getAssignedLecturers($courseID);
$lecturerIDs = [];
foreach ($assignedLecturers as $l) {
    array_push($lecturerIDs, $l['id']);
}

if (isset($_POST["submit"])) {
    $courseCode = $_POST["code"];
    $courseTitle = $_POST["title"];
    $lecturers = $_POST["lecturers"];

    // remove previously assigned lecturers
    Course::removeAssignedLecturers($courseID);
    
    $result = Course::assignLecturers($courseID, $lecturers);
    if ($result != null) {
        header('location:view-courses.php');
    } else {
        $submitError = 'Unable to create course.';
    }
}
?>


<h1 id="form-title">Edit Course Info</h1>
<form id="course-info" class="row" method="POST" action="">
    <div class="mb-3 col-md-12">
        <label for="course-code" class="form-label">Course Code</label>
        <input type="text" class="form-control" id="course-code" name="code" required
            value="<?php echo $course["code"] ?>">
    </div>

    <div class="mb-3 col-md-12">
        <label for="course-title" class="form-label">Course Title</label>
        <input type="text" class="form-control" id="course-title" name="title" required
            value="<?php echo $course["title"] ?>">
    </div>

    <div class="mb-3 col-md-12">
        <label for="lecturers" class="form-label">Assigned Lecturers</label>
        <select class="form-select" name="lecturers[]" id="lecturers" multiple required>
            <?php
            foreach ($allLecturers as $l) {
                $lid = $l['id'];
                $lname = $l['firstName'] . ' ' . $l['lastName'];
                $selected = in_array($lid, $lecturerIDs);
                echo "<option value='$lid'" . ($selected ? " selected" : "") . ">$lname</option>";
            }
            ?>
        </select>
    </div>

    <div class="col-md-12">
        <input type="submit" class="btn btn-success" id="update-btn" name="submit" value="Update Info" />
    </div>
</form>