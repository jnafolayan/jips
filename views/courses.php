<?php
require_once('../lib/layout.php');
$title = "Courses";
$style = "../static/stylesheets/index.css";

$courses = [
  [
    'course_id' => 22,
    'course_code' => 'CSC 415',
    'course_title' => 'Web Design',
    'lecturers' => [
      'Ikeoluwapo Are',
      'Ikeoluwapo Are',
    ]
    ],
  [
    'course_id' => 21,
    'course_code' => 'CSC 415',
    'course_title' => 'Web Design',
    'lecturers' => [
      'Ikeoluwapo Are',
      'Ikeoluwapo Are',
    ]
    ],
  [
    'course_id' => 02,
    'course_code' => 'CSC 415',
    'course_title' => 'Web Design',
    'lecturers' => [
      'Ikeoluwapo Are',
      'Ikeoluwapo Are',
    ]
    ],
    ];
    ?>


<div class='courses container'>

<h1>Courses</h1>

<div class='course-container'>

    <?php
    foreach ($courses as $course) {
      echo     "
      <div class='course-card shadow-sm'>
      <div class='img'>
      <img src='../static/images/books.jpg' class='card-img-top' alt='books' />
      </div>
      <div class='card-body'>
      <h5 class='card-title'>" . $course['course_code'] . "</h5>
      <p class='card-text'>" . $course['course_title'] . "</p>
      
      <p>Lecturers: <span class='lecturers'>" . join(", ",$course['lecturers']) . "</span></p>
      <a href=". 'course.php?id=' . $course['course_id'] . " class='btn btn-dark'>View Course</a>
      </div>
      </div>
      
      "
      ;
    }
      ?>

</div>
</div>



