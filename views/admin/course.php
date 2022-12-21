<?php
require_once('../../lib/layout.php');
$title = "Course Information";
$style = "../../static/index.css";
?>

<?php include "layouts/header.php"; ?>

<div class="container">
  <div class="row h-100">
    <div class="col-2">
      <?php include "layouts/side-bar.php" ?>
    </div>

    <div class="col-10">
      <div class="course container">
        <h1>Web Design</h1>
      
        <div class="info d-flex gap-3 flex-column">
          <div>
            <h6>Course Code</h6>
            <p>CSC 415</p>
          </div>
          <div>
            <h6>Course Title</h6>
            <p>Web Design</p>
          </div>
          <div>
            <h6>Course Level</h6>
            <p>400 Level</p>
          </div>
          <div>
            <h6>Department</h6>
            <p>Computer Science</p>
          </div>
          <div>
            <h6>Period</h6>
            <p>Monday 8:00 - 9:00</p>
          </div>
          <div>
            <h6>Students registered</h6>
            <p>93</p>
          </div>
          <div>
            <h6>Lecturers</h6>
      
            <div class="d-flex gap-3 flex-column">
              <div class="d-flex justify-content-between align-items-center">
                <p>Ikeoluwapo Are</p>
                <a class="btn btn-primary" href="profile.html">View Profile</a>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <p>Ikeoluwapo Are</p>
                <a class="btn btn-primary" href="">View Profile</a>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <p>Ikeoluwapo Are</p>
                <a class="btn btn-primary" href="">View Profile</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


