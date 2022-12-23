<?php
require_once('../../lib/layout.php');
require_once('../../modules/Course.php');
require_once('../../modules/Request.php');
$title = "Reschedule Lecture";
$style = "../../static/stylesheets/index.css";
$mess ;

if(!isset($_GET['lecture_id'])){
    header('location: /views/not-found.php');
}

if(isset($_POST['submit'])){
    $newDay = $_POST['day'];
    $startTime = $_POST['start-time'];
    $endTime = $_POST['end-time'];

    $res = Request::createRequest($_GET['lecture_id'], $newDay, $startTime, $endTime);

    if($res){

        echo "<script>alert('Request submitted successfully. Please wait for the admin to review this request')</script>";
        header('Refresh:2; url=lectures.php');

    }
}


    ?>


<div


  >
    <div class='p-2'>

          <h1 class='fs-5' id='exampleModalLabel'>
            Reschedule Lecture
          </h1>
        </div>
      
          <form method='post' class='d-flex gap-4 flex-column lecture-form'>
            <div>
              <label for='day'>New Day</label><br />
              <select name='day' class='form-select'>
                <option value='monday'>Monday</option>
                <option value='tuesday'>Tuesday</option>
                <option value='wednesday'>Wednesday</option>
                <option value='thursday'>Thursday</option>
                <option value='friday'>Friday</option>
              </select>
            </div>
            <div>
              <label for='start-time'>Start Time</label><br />
              <input class='form-control' type='time' name='start-time' id='start-time' required step='3600' min='09:00' max='17:00'/>
            </div>
            <div>
              <label for='end-time'>End Time</label><br />
              <input class='form-control' type='time' name='end-time' id='end-time' required step='3600' min='10:00' max='18:00'/>
            </div>
            <div class='d-flex align-items-center gap-2'>
              <input type='checkbox' name='recurring' />
              <label for='recurring'>Do this for subsequent lectures?</label>
            </div>
            <div class='d-flex justify-content-end'>
              <input
                type='submit'
                value='Submit'
                class='btn btn-primary'
                name='submit'
              />
            </div>
          </form>
  
      </div>
    </div>
  </div>



