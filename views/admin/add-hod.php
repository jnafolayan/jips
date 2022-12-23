<?php
require_once('../../lib/layout.php');
require_once('../../lib/protect.php');
require_once('../../modules/Department.php');
require_once('../../modules/Lecturer.php');
require_once('../../modules/Course.php');

$title = "Lecture Attendance System";
$style = "../../static/stylesheets/admin/add-course.css";

$lecturers = Lecturer::getLecturers();
$departments = Department::getDepartments();
$mess = '';
if(isset($_POST['lecturer']) && isset($_POST['department'])){
    $res = Lecturer::makeLecturerHOD($_POST['lecturer']);

    if($res){
        $mess .= "<p class='text-success'> Lecturer is now an HOD</p>";
    }
}

?>


<form method='post' class="wrapper">
    <?php
        echo $mess;
    ?>
    <label for="department">Departments</label>
<select class='form-select' name="department" id="department">
    <?php
foreach($departments as $department){
    echo "<option value='" . $department['id'] . "'> " . $department['name'] . "</option>";
    
}
    ?>
  </select>
  <label for="lecturer">Lecturers</label>
  <select class='form-select' name="lecturer" id="lecturer">
    <?php
foreach($lecturers as $lecturer){
    echo "<option value='" . $lecturer['id'] . "'> " . $lecturer['firstName'] . " " . $lecturer['lastName'] . "</option>";
    
}
    ?>
  </select>
    <input type="submit" name="submit" class="btn btn-success mt-4" id="submit-btn" value="Submit" />
  </form>
</div>