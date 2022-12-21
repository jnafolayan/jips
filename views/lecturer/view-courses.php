<?php
require_once('../../lib/layout.php');
$style = "../../static/stylesheets/lecturer/view-courses.css";
$courses = [];
for ($i = 1; $i < 21; $i++) {
  $course = [
    "sn" => $i,
    "course_id" => "Course{$i}_ID",
    "course_code" => "Course{$i}_Code",
    "course_title" => "Course{$i}_Title",
    "assigned_lecturers" => ["Assigned_Lecturer1"],
  ];
  array_push($courses, $course);
}
?>

<div class="wrapper">
  <div class="row" id="courses">
    <div class="courses container">
      <h1>Courses</h1>

      <div class="course-container">

        <?php
        foreach ($courses as $course) {
          $content = <<<EOD
            <div class="course-card shadow-sm">
              <div class="img">
                <img src="../../static/images/books.jpg" class="card-img-top" alt="books" />
              </div>
              <div class="card-body">
                <h5 class="card-title">CSC 415</h5>
                <p class="card-text">Web Design</p>
                <p>Lecturers: <span class="lecturers">Ikeoluwapo Are</span></p>
                <a href="course.html" class="btn btn-dark">View Course</a>
              </div>
            </div>
            EOD;

          echo $content;
        }
        ?>
        <!-- <div class="course-card shadow-sm">
          <div class="img">
            <img src="../../static/images/books.jpg" class="card-img-top" alt="books" />
          </div>
          <div class="card-body">
            <h5 class="card-title">CSC 415</h5>
            <p class="card-text">Web Design</p>
            <p>Lecturers: <span class="lecturers">Ikeoluwapo Are</span></p>
            <a href="course.html" class="btn btn-dark">View Course</a>
          </div>
        </div>

        <div class="course-card shadow-sm">
          <div class="img">
            <img src="../../static/images/books.jpg" class="card-img-top" alt="books" />
          </div>
          <div class="card-body">
            <h5 class="card-title">CSC 415</h5>
            <p class="card-text">Web Design</p>

            <p>Lecturers: <span class="lecturers">Ikeoluwapo Are</span></p>
            <a href="course.html" class="btn btn-dark">View Course</a>
          </div>
        </div>

        <div class="course-card shadow-sm">
          <div class="img">
            <img src="../../static/images/books.jpg" class="card-img-top" alt="books" />
          </div>
          <div class="card-body">
            <h5 class="card-title">CSC 415</h5>
            <p class="card-text">Web Design</p>
            <p>Lecturers: <span class="lecturers">Ikeoluwapo Are</span></p>
            <a href="course.html" class="btn btn-dark">View Course</a>
          </div>
        </div>

        <div class="course-card shadow-sm">
          <div class="img">
            <img src="../../static/images/books.jpg" class="card-img-top" alt="books" />
          </div>
          <div class="card-body">
            <h5 class="card-title">CSC 415</h5>
            <p class="card-text">Web Design</p>
            <p>Lecturers: <span class="lecturers">Ikeoluwapo Are</span></p>
            <a href="course.html" class="btn btn-dark">View Course</a>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</div>