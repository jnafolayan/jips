<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="index.css" />
    <title>Lecture</title>
  </head>
  <body>
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
            <form action="" class="d-flex gap-4 flex-column lecture-form">
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
                <input class="form-control" type="text" name="start-time" />
              </div>
              <div>
                <label for="end-time">End Time</label><br />
                <input class="form-control" type="text" name="end-time" />
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

          <a class="btn btn-success" href="">Start Lecture</a>
          <a class="btn btn-danger" href="">End Lecture</a>
          <a class="btn btn-primary" href="">Generate Registration Link</a>
          <a
            class="btn btn-dark"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal"
            href="#"
            >Reschedule Lecture</a
          >
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

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
