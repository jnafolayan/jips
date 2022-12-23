<?php
require_once('../../lib/layout.php');
$style = "../../static/stylesheets/admin/edit-lecturer-info.css";

require_once('../../modules/Lecturer.php');
require_once('../../modules/Department.php');

$titles = ["Mr.", "Mrs.", "Miss", "Dr.", "Professor"];

$eid = isset($_GET['eid']) ? $_GET['eid'] : null;
$lecturer = Lecturer::getLecturerByEmployeeID($eid);
if (!$lecturer) {
  header('location: /not-found.php');
}

$departments = Department::getDepartments();
$submitError = null;

// Functionality to be executed after a form is submitted// Functionality after a form is submitted
if (isset($_POST["submit"])) {
  $title = $_POST['title'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $departmentID = $_POST['department'];

  $res = Lecturer::updateLecturerByEmployeeID($eid, $title, $firstName, $lastName, $departmentID);
  if ($res) {
    header('location: view-lecturers.php');
  } else {
    $submitError = 'Unable to update lecturer.';
  }
}
?>


<div class="wrapper">
  <h1 id="form-title">Edit Lecturer Info</h1>

  <?php
  if ($submitError) {
    echo "<p class='text-danger'>$submitError</p>";
  }
  ?>
  <form id="lecturer-info" class="row" method="POST" action="">
    <div class="mb-3 col-md-2">
      <label for="title" class="form-label">Title</label>
      <select class="form-select" name="title" id="title" required>
        <?php
        foreach ($titles as $title) {
          $selected = $title === $lecturer['title'];
          echo $selected ? "<option value='$title' selected>{$title}</option>" : "<option value='$title'>{$title}</option>";
        }
        ?>
      </select>
    </div>

    <div class="mb-3 col-md-5">
      <label for="lastName" class="form-label">Lastname</label>
      <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lecturer["lastName"] ?>">
    </div>

    <div class="mb-3 col-md-5">
      <label for="firstName" class="form-label">Firstname</label>
      <input type="text" class="form-control" id="firstName" name="firstName"
        value="<?php echo $lecturer["firstName"] ?>">
    </div>

    <div class="mb-3 col-md-12">
      <label for="department" class="form-label">Department</label>
      <select class="form-select" name="department" id="department">
        <?php
        foreach ($departments as $dept) {
          $deptID = $dept['id'];
          $deptName = $dept['name'];
          echo "<option value='$deptID'>{$deptName}</option>";
        }
        ?>
      </select>
    </div>

    <div class="col-md-12">
      <input type="submit" name="submit" class="btn btn-success" id="update-btn" value="Update Info" />
    </div>
  </form>
</div>