<?php
require_once('../lib/layout.php');
$title = "Lecture Attendance System";
$style = "../static/view-courses.css";
$lecturers = ["Lecturer 1", "Lecturer 2", "Lecturer 3", "Lecturer 4", "Lecturer 5"];
$courses = ["Course 1", "Course 2", "Course 3", "Course 4", "Course 5", "Course 6", "Course 7", "Course 8", "Course 9", "Course 10"];
?>

<?php include "layouts/header.php"; ?>

<div class="container">
  <div class="row h-100">
    <div class="col-2 aside">
      <?php include "layouts/side-bar.php" ?>
    </div>

    <div class="col-10 main-content">
      <div class="row" id="courses">
        <?php
        for ($i = 0; $i < sizeof($courses); $i++) {
          $content = <<<EOD
          <div class="card col-sm-3">
            <div class="card-body">
              <h5 class="card-title">Course Code</h5>
              <p class="card-text">Course Title. Some quick example text to build on the card title.</p>
            </div>
          </div>
          EOD;
          echo $content;
        }
        ?>
      </div>
    </div>
  </div>
</div>