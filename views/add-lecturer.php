<?php
require_once('../lib/layout.php');
$title = "Lecture Attendance System";
$style = "../static/add-lecturer.css";
$lecturers = ["Lecturer 1", "Lecturer 2", "Lecturer 3", "Lecturer 4", "Lecturer 5"];
$courses = ["Course 1", "Course 2", "Course 3", "Course 4", "Course 5"];
$titles = ["Mr.", "Mrs.", "Miss", "Dr.", "Professor"];
?>


<?php include "layouts/header.php"; ?>

<div class="container">
  <div class="row h-100">
    <div class="col-2 aside">
      <?php include "layouts/side-bar.php" ?>
    </div>

    <div class="col-10 main-content">
      <h1 id="form-title">Add New Lecturer</h1>
      <form id="new-course-form" class="row" method="post" action="">
        <div class="mb-3 col-md-2">
          <label for="Title" class="form-label">Title</label>
          <select class="form-select" name="title" id="title">
            <?php
            for ($i = 0; $i < sizeof($courses); $i++) {
              echo "<option value='title.id'>{$titles[$i]}</option>";
            }
            ?>
          </select>
        </div>

        <div class="mb-3 col-md-5">
          <label for="lastName" class="form-label">Lastname</label>
          <input type="text" class="form-control" id="lastname" name="lastName" placeholder="Lastname">
        </div>

        <div class="mb-3 col-md-5">
          <label for="firstName" class="form-label">Firstname</label>
          <input type="text" class="form-control" id="firstname" name="firstName" placeholder="Firstname">
        </div>

        <div class="mb-3 col-md-12">
          <label for="department" class="form-label">Department</label>
          <input type="text" class="form-control" id="department" name="department" placeholder="Department">
        </div>

        <div class="mb-3 col-md-12">
          <label for="lecturer">Course</label>
          <select class="form-select" name="lecturer" id="lecturer">
            <?php
            for ($i = 0; $i < sizeof($courses); $i++) {
              echo "<option value='lecturer.id'>{$courses[$i]}</option>";
            }
            ?>
          </select>
        </div>

        <div class="col-md-12">
          <button type="submit" class="btn btn-success" id="submit-btn">Add Lecturer</button>
        </div>
      </form>
    </div>
  </div>
</div>