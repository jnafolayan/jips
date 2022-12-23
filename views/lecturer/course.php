<?php
require_once('../../lib/layout.php');
require_once('../../modules/Course.php');
$title = "Course Information";
$style = "../../static/stylesheets/index.css";

if(isset($_GET['course_id'])){
  $course = Course::getCourseByID($_GET['course_id']);

  if(isset($course)){

    echo "<div class='course container'>
      <h1>" . $course['title'] . "</h1>
    
      <div class='info d-flex gap-3 flex-column'>
        <div>
          <h6>Course Code</h6>
          <p>" . $course['code'] . "</p>
        </div>
        <div>
          <h6>Course Title</h6>
          <p>" . $course['title'] . "</p>
        </div>
        <div>
          <h6>Course Level</h6>
          <p>" . $course['level'] . " Level</p>
        </div>
        <div>
          <h6>Department</h6>
          <p>" . $course['departmentName'] . "</p>
        </div>
        <div>
          <h6>Lecture Period</h6>
          <p>Monday 8:00 - 9:00</p>
        </div>
        <div>
          <h6>Lecturers</h6>
    
          <div class='d-flex gap-3 flex-column'>
            <div class='d-flex justify-content-between align-items-center'>
              <p>Ikeoluwapo Are</p>
              <a class='btn btn-primary' href='profile.html'>View Profile</a>
            </div>
            <div class='d-flex justify-content-between align-items-center'>
              <p>Ikeoluwapo Are</p>
              <a class='btn btn-primary' href=''>View Profile</a>
            </div>
            <div class='d-flex justify-content-between align-items-center'>
              <p>Ikeoluwapo Are</p>
              <a class='btn btn-primary' href=''>View Profile</a>
            </div>
          </div>
        </div>
      </div>
    </div>";
  }else{
    echo "<div class='d-flex align-items-center justify-content-center pt-4'>
      <p class='not-found'>Course Not Found</p>
    
    </div>";
  }

}else{
  echo "<div class='d-flex align-items-center justify-content-center pt-4'>
      <p class='not-found'>Course Not Found</p>
    
    </div>";
}
?>



