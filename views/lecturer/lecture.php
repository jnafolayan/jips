
  <?php
require_once('../../lib/layout.php');
$title = "Lecture";
$style = "../../static/stylesheets/index.css";

if(isset($_POST['action'])){
  //change state to started
  //redirect attendace.php?lecture=ledtureid
  //on attendance page check if state is true
}

?>
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">
              Reschedule Lecture
            </h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form action="post" class="d-flex gap-4 flex-column lecture-form">
              <div>
                <label for="day">New Day</label><br />
                <select name="day" class="form-select">
                  <option value="monday">Monday</option>
                  <option value="tuesday">Tuesday</option>
                  <option value="wednesday">Wednesday</option>
                  <option value="thursday">Thursday</option>
                  <option value="friday">Friday</option>
                </select>
              </div>
              <div>
                <label for="start-time">Start Time</label><br />
                <input class="form-control" type="time" name="start-time" id="start-time" required step="3600" min="09:00" max="17:00"/>
              </div>
              <div>
                <label for="end-time">End Time</label><br />
                <input class="form-control" type="time" name="end-time" id="end-time" required step="3600" min="10:00" max="18:00"/>
              </div>
              <div class="d-flex align-items-center gap-2">
                <input type="checkbox" name="recurring" />
                <label for="recurring">Do this for subsequent lectures?</label>
              </div>
              <div class="d-flex justify-content-end">
                <input
                  type="submit"
                  value="Submit"
                  class="btn btn-primary"
                  name="submit"
                />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="lecture container">
      <div class="d-flex justify-content-between align-items-center heading">
        <h1>CSC 415 Lecture</h1>

        <a class="btn btn-dark" href="course.html">View Course</a>
      </div>

      <div class="info d-flex gap-3 flex-column">
        <div>
          <h6>Period</h6>
          <p>Monday 8:00 - 9:00</p>

          <form action="" class="d-flex gap-3">
            <input class="btn btn-success" name="action" type="submit" value="Start Lecture" />
            <input class="btn btn-danger" name="action" type="submit" value="End Lecture" />
            <button
              class="btn btn-dark d-flex"
              data-bs-toggle="modal"
              data-bs-target="#exampleModal"
              href="#"
              >Reschedule Lecture</button
            >

          </form>
        </div>
      </div>

      <div class="attendance">
        <div class="row">
          <div class="col"><h6>Lecture Date</h6></div>
          <div class="col"><h6>Attendance</h6></div>
          <div class="col"></div>
        </div>
        <div class="row">
          <div class="col">21-12-22</div>
          <div class="col">99</div>
          <div class="col">
            <a class="btn btn-primary" href="students.html">View Students</a>
          </div>
        </div>
        <div class="row">
          <div class="col">21-12-22</div>
          <div class="col">99</div>
          <div class="col">
            <a class="btn btn-primary" href="">View Students</a>
          </div>
        </div>
      </div>
    </div>

