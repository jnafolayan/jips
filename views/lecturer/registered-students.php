<?php
require_once('./partials/session.php');

require_once('../../lib/layout.php');
$title = "Registered Students";
$style = "../../static/stylesheets/index.css";
require_once('../../modules/Attendance.php');

$attendance = Attendance::getAttendanceForLecture($_GET['lecture_id']);

?>
    <div class="container students">
      <h1>Students</h1>

      <p>Students in attendance for CSC 415 lecture on 23-12-22</p>

      <div class="row">
        <div class="col"><h6>Matric Numbers</h6></div>
      </div>

      <?php
foreach($attendance as $student){
  echo "<div class='row'>
  <div class='col'>" . $student['matricNumber'] . "</div>
</div>";
}
      ?>
      

    </div>
    