<?php
require_once('./partials/session.php');

require_once('../../lib/layout.php');
require_once('../../modules/Lecture.php');

$lecturerID = $_SESSION['user']['id'];
$lectures = Lecture::getLecturesForLecturer($lecturerID);

// $timeMap = [
//   '9:00' => 0,
//   '10:00' => 1,
//   '11:00' => 2,
//   '12:00' => 3,
//   '13:00' => 4,
//   '14:00' => 5,
//   '15:00' => 6,
//   '16:00' => 7,
//   '17:00' => 8,
//   '18:00' => 9,
// ];

// $dayMap = [
//   'monday' => 1,
//   'tuesday' => 2,
//   'wednesday' => 3,
//   'thursday' => 4,
//   'friday' => 5,
// ];



// for($i = 0; $i < 10; $i++){
//   foreach($lectures as $lecture){
//     if( $i === $timeMap[$lecture['startTime']]){
//       for($j = 0; $j < 6; $j++){
//         if($j === 0){
//           <div class="row gap-3">
//         <div class="col">8:00 - 9:00</div>
//         }
//         if($dayMap[$lecture['day']]){
//           echo "<div class='col'>
//           <div class='card'>
//             <div class='card-body'>
//               <h5 class='card-title'>CSC 415</h5>
//               <h6 class='card-subtitle mb-2 text-muted'>Web Design</h6>

//               <a href='lecture.html' target='_blank' class='card-link'
//                 >View Lecture</a
//               >
//             </div>
//           </div>
//         </div>";
//         }else{
//           echo ""
//         }
        
        
//         <div class="col"></div>
//         <div class="col"></div>
//         <div class="col"></div>
//         <div class="col"></div>
//       </div>
//       }
//     }
//   }
//}

$title = "Lectures";
$style = "../../static/stylesheets/index.css";
?>

<div class="container lectures">

<?php
if(count($lectures) === 0){
  echo "<p class='d-flex align-items-center justify-content-center p-4 fs-4'>No Lectures</p>";
}else{
  $el = "";
foreach($lectures as $lecture){
  $el .= "
  <div class='new-row row gap-3'>
  <div class='col'>" . $lecture['day'] . "</div>
  <div class='col'>" . $lecture['startTime'] . "</div>
  <div class='col'>" . $lecture['endTime'] . "</div>
  <div class='col'>" . $lecture['code'] . "</div>
  <div class='col'>
  <a href='lecture.php?lecture_id=" . $lecture['id'] . "'>View Lecture</a>
  </div>
  </div>
  ";
};

echo "<div class='row gap-3'>
<div class='col'><h6 class='days-heading'>Day</h6></div>
<div class='col'><h6 class='days-heading'>Start Time</h6></div>
<div class='col'><h6 class='days-heading'>End Time</h6></div>
<div class='col'><h6 class='days-heading'>Course</h6></div>
<div class='col'></div>

</div>" . $el;
}
?>

</div>

    <!-- <div class="lectures container d-grid">
      <div class="row gap-3">
        <div class="col"><h6 class="days-heading">Time/Day</h6></div>
        <div class="col"><h6 class="days-heading">Monday</h6></div>
        <div class="col"><h6 class="days-heading">Tuesday</h6></div>
        <div class="col"><h6 class="days-heading">Wednesday</h6></div>
        <div class="col"><h6 class="days-heading">Thursday</h6></div>
        <div class="col"><h6 class="days-heading">Friday</h6></div>
      </div>
      <div class="row gap-3">
        <div class="col">8:00 - 9:00</div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">CSC 415</h5>
              <h6 class="card-subtitle mb-2 text-muted">Web Design</h6>

              <a href="lecture.html" target="_blank" class="card-link"
                >View Lecture</a
              >
            </div>
          </div>
        </div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
      </div>
      <div class="row gap-3">
        <div class="col">9:00 - 10:00</div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">CSC 415</h5>
              <h6 class="card-subtitle mb-2 text-muted">Web Design</h6>

              <a href="#" target="_blank" class="card-link">View Lecture</a>
            </div>
          </div>
        </div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">CSC 415</h5>
              <h6 class="card-subtitle mb-2 text-muted">Web Design</h6>

              <a href="#" target="_blank" class="card-link">View Lecture</a>
            </div>
          </div>
        </div>
        <div class="col"></div>
      </div>
      <div class="row gap-3">
        <div class="col">10:00 - 11:00</div>
        <div class="col"></div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">CSC 415</h5>
              <h6 class="card-subtitle mb-2 text-muted">Web Design</h6>

              <a href="#" target="_blank" class="card-link">View Lecture</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">CSC 415</h5>
              <h6 class="card-subtitle mb-2 text-muted">Web Design</h6>

              <a href="#" target="_blank" class="card-link">View Lecture</a>
            </div>
          </div>
        </div>
        <div class="col"></div>
        <div class="col"></div>
      </div>
      <div class="row gap-3">
        <div class="col">11:00 - 12:00</div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">CSC 415</h5>
              <h6 class="card-subtitle mb-2 text-muted">Web Design</h6>

              <a href="#" target="_blank" class="card-link">View Lecture</a>
            </div>
          </div>
        </div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
      </div>
      <div class="row gap-3">
        <div class="col">1:00 - 2:00</div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
      </div>
      <div class="row gap-3">
        <div class="col">2:00 - 3:00</div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
      </div>
      <div class="row gap-3">
        <div class="col">3:00 - 4:00</div>
        <div class="col"></div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">CSC 415</h5>
              <h6 class="card-subtitle mb-2 text-muted">Web Design</h6>

              <a href="#" target="_blank" class="card-link">View Lecture</a>
            </div>
          </div>
        </div>
        <div class="col"></div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">CSC 415</h5>
              <h6 class="card-subtitle mb-2 text-muted">Web Design</h6>

              <a href="#" target="_blank" class="card-link">View Lecture</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">CSC 415</h5>
              <h6 class="card-subtitle mb-2 text-muted">Web Design</h6>

              <a href="#" target="_blank" class="card-link">View Lecture</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row gap-3">
        <div class="col">4:00 - 5:00</div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">CSC 415</h5>
              <h6 class="card-subtitle mb-2 text-muted">Web Design</h6>

              <a href="#" target="_blank" class="card-link">View Lecture</a>
            </div>
          </div>
        </div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
      </div>
      <div class="row gap-3">
        <div class="col">5:00 - 6:00</div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">CSC 415</h5>
              <h6 class="card-subtitle mb-2 text-muted">Web Design</h6>

              <a href="#" target="_blank" class="card-link">View Lecture</a>
            </div>
          </div>
        </div>
        <div class="col"></div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">CSC 415</h5>
              <h6 class="card-subtitle mb-2 text-muted">Web Design</h6>

              <a href="#" target="_blank" class="card-link">View Lecture</a>
            </div>
          </div>
        </div>
        <div class="col"></div>
        <div class="col"></div>
      </div>
    </div>

 -->
