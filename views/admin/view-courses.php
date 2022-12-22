<?php
require_once('../../lib/layout.php');
$style = "../../static/stylesheets/admin/view-courses.css";

require_once('../../modules/Course.php');

$courses = Course::getCourses();
?>

<div class="wrapper">
  <div class="row" id="courses">
    <?php
    foreach ($courses as $course) {
      $code = $course['code'];
      $title = $course['title'];
      // $department = $course['departmentName'];

      echo "<div class='card col-sm-3'>
        <div class='card-body'>
          <h5 class='card-title'>$code</h5>
          <p class='card-text'>$title</p>
        </div>
      </div>";
    }
    ?>
  </div>

</div>