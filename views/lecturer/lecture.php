
  <?php
require_once('./partials/session.php');

require_once('../../lib/layout.php');
$title = "Lecture";
$link = '';
$style = "../../static/stylesheets/index.css";
require_once('../../modules/Lecture.php');
require_once('../../modules/Course.php');
require_once('../../modules/Attendance.php');

if(isset($_GET['lecture_id'])){
  $lecture = Lecture::getLectureByID($_GET['lecture_id']);

  if(isset($lecture)){
    $course = Course::getCourseByID($lecture['courseID']);
    $attendance = Attendance::getAttendanceForLecture($_GET['lecture_id']);

    if(isset($_POST['action'])){

      if($_POST['action'] === 'Start Lecture'){
        $res = Lecture::startLecture($_GET['lecture_id']);

        if($res){
          $link = "<a href='attendance.php?lecture_id=" . $_GET['lecture_id'] ." '> Attendance registration link</a>";
        }
      }
      elseif($_POST['action'] === 'End Lecture'){
        $res = Lecture::endLecture($_GET['lecture_id']);

        if($res){
          $link = "";
        }
      }
    }

    echo " 

  <div class='lecture container'>
    <div class='d-flex justify-content-between align-items-center heading'>
      <h1><span class='text-uppercase'> " . $course['code'] . " </span> " . " " ." Lecture</h1>

      <a class='btn btn-dark' href='course.php?course_id=" . $lecture['courseID'] . "'>View Course</a>
    </div>

    <div class='info d-flex gap-3 flex-column'>
      <div>
        <h6>Period</h6>
        <p><span class='text-capitalize'> " . $lecture['day'] . "</span>" ." ". $lecture['startTime'] . " - " . $lecture['endTime'] . "</p>

        <form action='' method='post' class='d-flex gap-3'>
          <input class='btn btn-success' name='action' type='submit' value='Start Lecture' />
          <input class='btn btn-danger' name='action' type='submit' value='End Lecture' />
          <a
            class='btn btn-dark d-flex'

            href='reschedule-lecture.php?lecture_id=". $_GET['lecture_id'] ."'
            >Reschedule Lecture</a
          >

        </form>

        " . $link . "
      </div>
    </div>

    <div class='attendance'>
      <div class='row'>
        <div class='col'><h6>Lecture Date</h6></div>
        <div class='col'><h6>Attendance</h6></div>
        <div class='col'></div>
      </div>
      <div class='row'>
        <div class='col'>23-12-22</div>
        <div class='col'>". count($attendance)."</div>
        <div class='col'>
          <a class='btn btn-primary' href='registered-students.php?lecture_id=" . $_GET['lecture_id'] ."' >View Students</a>
        </div>
      </div>

    </div>
  </div>

";
  }else{
    echo "<p class='fs-4 d-flex align-items-center justify-content-center p-4'>Lecture does not exist</p>";
  }
}else{
  echo "<p class='fs-4 d-flex align-items-center justify-content-center p-4'>Lecture does not exist</p>";
}


?>
