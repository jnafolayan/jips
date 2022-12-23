<?php
require_once('./partials/session.php');

require_once('../../lib/layout.php');
$title = "Lecturer Profile";
$style = "../../static/stylesheets/index.css";
require_once('../../modules/Lecturer.php');
require_once('../../modules/Course.php');

$lecturerID = $_SESSION['user']['id'];
$lecturer = Lecturer::getLecturerByID($lecturerID);
$courses = Course::getLecturerCourses($lecturerID);

?>
<div class="container profile">
  <h1>Profile</h1>

  <div class="d-flex profile-info">
    <div class="picture">
      <img src="../../static/images/avatar.png" alt="" />
    </div>

    <div class="details">
      <p class="fields">ID:</p>
      <p class="values"><?php echo $lecturer["employeeID"]; ?></p>

      <p class="fields">Title:</p>
      <p class="values"><?php echo $lecturer["title"] ?></p>

      <p class="fields">Name:</p>
      <p class="values"><?php echo $lecturer["firstName"] . " " . $lecturer["lastName"] ?></p>

      <p class="fields">Email:</p>
      <p class="values"><?php echo $lecturer["email"] ?></p>

      <p class="fields">Department:</p>
      <p class="values"><?php echo $lecturer["departmentName"] ?></p>
    </div>
  </div>

  <div class="courses">
    <h4>Courses:</h4>

    <div class="table">
      <div class="row">
        <div class="col col-3">
          <h6>Course code</h6>
        </div>
        <div class="col col-3">
          <h6>Course title</h6>
        </div>
      </div>

      <?php
      foreach ($courses as $course) {
        echo "<div class='row'>
            <div class='col col-3 text-uppercase'>" . $course['code'] . "</div>
            <div class='col col-3 text-capitalize'>" . $course['title'] . "</div>
          </div>";
      }
      ?>

    </div>
  </div>
</div>