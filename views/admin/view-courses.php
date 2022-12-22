<?php
require_once('../../lib/layout.php');
$style = "../../static/stylesheets/admin/view-courses.css";

require_once('../../modules/Course.php');

$courses = Course::getCourses();
?>

<div class="wrapper">
    <?php
    if (count($courses) === 0) {
        echo '<div class="fs-5 no-courses">No courses available at the moment.</div>';
    }
    ?>
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

          <a href='/views/admin/view-course-info.php?code=$code'>Open course</a>
        </div>
      </div>";
        }
        ?>
    </div>

</div>