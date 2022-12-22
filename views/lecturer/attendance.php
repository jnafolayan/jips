<?php
require_once('../../lib/layout.php');
$style = "../../static/stylesheets/lecturer/attendance.css";
?>

<div class="flex flex-column container align-items-center registration">
  <h1 class="text-center">Attendance</h1>
  <p class="text-center">
    This is the attendance for CSC 415, fill in your name and matric number.
  </p>

  <form action="" class="d-flex flex-column align-items-center gap-4">
    <div>
      <p class="text-center">Full Name</p>
      <input type="text" name="fullname" class="form-control" />
    </div>
    <div>
      <p class="text-center">Matric Number</p>
      <input type="text" name="matric-no" class="form-control" />
    </div>

    <input type="submit" value="Submit" name="submit" class="btn btn-primary">
  </form>
</div>