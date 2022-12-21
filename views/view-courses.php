<?php
require_once('../lib/layout.php');
$title = "<title>Lecture Attendance System</title>";
$style = "<link rel='stylesheet' href='../static/view-courses.css' />";
$lecturers = ["Lecturer 1", "Lecturer 2", "Lecturer 3", "Lecturer 4", "Lecturer 5"];
$courses = ["Course 1", "Course 2", "Course 3", "Course 4", "Course 5", "Course 6", "Course 7", "Course 8", "Course 9", "Course 10"];
?>

<header class="header">
  <a href="admin.php" id="header-text">Admin Dashboard</a>

  <div class="logout">
    <a href="logout.php" class="btn btn-primary">Logout</a>
  </div>
</header>

<div class="container">
  <div class="row h-100">
    <div class="col-2 aside">
      <?php include "layouts/side-bar.php" ?>
    </div>

    <div class="col-10 main-content px-5" id="courses">
      <div class="row gx-3 gy-3">
        <?php
        for ($i = 0; $i < sizeof($courses); $i++) {
          $content = <<<EOD
          <div class="card col-md-4 col-sm-6">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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