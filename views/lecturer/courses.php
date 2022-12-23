<?php
require_once('../../lib/layout.php');
require_once('../../modules/Course.php');
$title = "Courses";
$style = "../../static/stylesheets/index.css";

$fakeId = 1;
$courses = Course::getLecturerCourses($fakeId);

if(count($courses) === 0){
  echo "<div class='d-flex align-items-center justify-content-center pt-4'>
      <p class='not-found'>No Courses</p>
    
    </div>";
}else{
  $ele = "";
  foreach ($courses as $course) {
    $ele .= "
    <div class='course-card shadow-sm'>
    <div class='img'>
    <img src='../../static/images/books.jpg' class='card-img-top' alt='books' />
    </div>
    <div class='card-body'>
    <h5 class='card-title'>" . $course['code'] . "</h5>
    <p class='card-text'>" . $course['title'] . "</p>
    
    <p>Lecturers: <span class='lecturers'>" . join(", ",['ike', 'are']) . "</span></p>
    <a href=". 'course.php?course_id=' . $course['id'] . " class='btn btn-dark'>View Course</a>
    </div>
    </div>
    
    "
    ;
  }
  echo "<div class='courses container'>

<h1>Courses</h1>

<div class='course-container'>" . $ele .

    
"</div>
</div>";
}
    



// $courses = [
//   [
//     'course_id' => 22,
//     'course_code' => 'CSC 415',
//     'course_title' => 'Web Design',
//     'lecturers' => [
//       'Ikeoluwapo Are',
//       'Ikeoluwapo Are',
//     ]
//     ],
//   [
//     'course_id' => 21,
//     'course_code' => 'CSC 415',
//     'course_title' => 'Web Design',
//     'lecturers' => [
//       'Ikeoluwapo Are',
//       'Ikeoluwapo Are',
//     ]
//     ],
//   [
//     'course_id' => 02,
//     'course_code' => 'CSC 415',
//     'course_title' => 'Web Design',
//     'lecturers' => [
//       'Ikeoluwapo Are',
//       'Ikeoluwapo Are',
//     ]
//     ],
//     ];
    ?>






