<?php
require_once('../lib/layout.php');
$style = "../static/stylesheets/view-lecturer-info.css";
$script = "../static/scripts/view-lecturer-info.js";
$lecturer = [
  "lecturer_id" => "Lect_ID",
  "title" => "Lect_Title",
  "lastname" => "Lecturer_Lastname",
  "firstname" => "Lecturer_Firstname",
  "department" => "Lecturer_Department",
  "course" => "Lecturer_Course"
];
?>


<h1 id="form-title">View Lecturer Info</h1>

<form id="lecturer-info" class="row" method="POST" action="edit-lecturer-info.php">
  <input type="text" name="lecturer-id" value="<?php echo $lecturer["lecturer_id"] ?>" hidden>
  <div class="mb-3 col-md-2">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" value="<?php echo $lecturer["title"] ?>" disabled readonly>
  </div>

  <div class="mb-3 col-md-5">
    <label for="lastname" class="form-label">Lastname</label>
    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lecturer["lastname"] ?>" disabled readonly>
  </div>

  <div class="mb-3 col-md-5">
    <label for="firstname" class="form-label">Firstname</label>
    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $lecturer["firstname"] ?>" disabled readonly>
  </div>

  <div class="mb-3 col-md-12">
    <label for="department" class="form-label">Department</label>
    <input type="text" class="form-control" id="department" name="department" value="<?php echo $lecturer["department"] ?>" disabled readonly>
  </div>

  <div class="mb-3 col-md-12">
    <label for="course">Course</label>
    <input type="text" class="form-control" id="course" name="course" value="<?php echo $lecturer["course"] ?>" disabled readonly>
  </div>

  <div class="col-md-12">
    <div class="row">
      <div class="col-md-6">
        <button type="submit" class="btn btn-primary" id="submit-btn">Edit Info</button>
      </div>
      <div class="col-md-6">
        <button type="button" class="btn btn-danger" id="delete-btn">Delete Info</button>
      </div>
    </div>
  </div>

</form>