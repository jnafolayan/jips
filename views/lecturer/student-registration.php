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
    <link rel="stylesheet" href="../../static/stylesheets/index.css" />
    <title>Student Registration</title>
  </head>
  <body>
    <div class="flex flex-column container align-items-center registration">
      <h1 class="text-center">Attendance</h1>
      <p class="text-center">
        This is the attendance for CSC 415, fill in your name and matric number.
      </p>

      <form action="" class="d-flex flex-column align-items-center gap-4">
        <div>
          <p class="text-center">Full Name</p>
          <input type="text" name="fullname" class="form-control" />
        </div>
        <div>
          <p class="text-center">Matric Number</p>
          <input type="text" name="matric-no" class="form-control" />
        </div>

        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
      </form>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
