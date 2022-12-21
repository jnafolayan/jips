<?php
require_once('../../lib/layout.php');
$style = "../../static/stylesheets/admin/edit-lecturer-info.css";
$lecturer = [
  "id" => "Lect_ID",
  "title" => "Lect_Title",
  "lastname" => "Lecturer_Lastname",
  "firstname" => "Lecturer_Firstname",
  "department" => "Lecturer_Department",
  "course" => "Lecturer_Course"
];

// Functionality to be executed after a form is submitted// Functionality after a form is submitted
if (isset($_POST["submit"])) {
  null;
}
?>


<h1 id="form-title">Edit Lecturer Info</h1>

<form id="lecturer-info" class="row" method="POST" action="/<?php echo $lecturer["id"]; ?>/edit-info.php">
  <div class="mb-3 col-md-2">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" value="<?php echo $lecturer["title"] ?>">
  </div>

  <div class="mb-3 col-md-5">
    <label for="lastname" class="form-label">Lastname</label>
    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lecturer["lastname"] ?>">
  </div>

  <div class="mb-3 col-md-5">
    <label for="firstname" class="form-label">Firstname</label>
    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $lecturer["firstname"] ?>">
  </div>

  <div class="mb-3 col-md-12">
    <label for="department" class="form-label">Department</label>
    <input type="text" class="form-control" id="department" name="department" value="<?php echo $lecturer["department"] ?>">
  </div>

  <div class="mb-3 col-md-12">
    <label for="course">Course</label>
    <input type="text" class="form-control" id="course" name="course" value="<?php echo $lecturer["course"] ?>">
  </div>

  <div class="col-md-12">
    <button type="submit" class="btn btn-success" id="update-btn">Update Info</button>
  </div>
</form>