<?php
require_once('../../lib/layout.php');
$title = "Lecturer Profile";
$style = "../../static/stylesheets/index.css";

$lecturer = [
  'lecturer_id' => 1236778,
  'title' => 'Mr',
  'name' => 'Ikeoluwapo Are',
  'phone' => '0405068886',
  'email' => 'johndoe@mmm.co',
  'department' => 'Computer Science',
  'courses' => [
    [
      'course_code' => 'CSC 415',
    'course_title' => 'Web Design'
    ],
    [
      'course_code' => 'CSC 415',
    'course_title' => 'Web Design'
    ],
    [
      'course_code' => 'CSC 415',
    'course_title' => 'Web Design'
    ],
  ]
]

?>
    <div class="container profile">
      <h1>Profile</h1>

      <div class="d-flex profile-info">
        <div class="picture">
          <img src="../../static/images/avatar.png" alt="" />
        </div>

        <div class="details">
          <p class="fields">ID:</p>
          <p class="values"><?php echo $lecturer["lecturer_id"];?></p>

          <p class="fields">Title:</p>
          <p class="values"><?php echo $lecturer["title"]?></p>

          <p class="fields">Name:</p>
          <p class="values"><?php echo $lecturer["name"]?></p>

          <p class="fields">Phone:</p>
          <p class="values"><?php echo $lecturer["phone"]?></p>

          <p class="fields">Email:</p>
          <p class="values"><?php echo $lecturer["email"]?></p>

          <p class="fields">Department:</p>
          <p class="values"><?php echo $lecturer["department"]?></p>
        </div>
      </div>

      <div class="courses">
        <h4>Courses:</h4>

        <div class="table">
          <div class="row">
            <div class="col col-3"><h6>Course code</h6></div>
            <div class="col col-3"><h6>Course title</h6></div>
          </div>

          <?php 
          foreach ($lecturer['courses'] as $course) {
            echo "<div class='row'>
            <div class='col col-3'>" . $course['course_code'] ."</div>
            <div class='col col-3'>" . $course['course_title'] ."</div>
          </div>";
          }
          ?>

        </div>
      </div>
    </div>

