<?php
$lecturers = ["Lecturer 1", "Lecturer 2", "Lecturer 3", "Lecturer 4", "Lecturer 5"];
$courses = ["Course 1", "Course 2", "Course 3", "Course 4", "Course 5"];
$titles = ["Mr.", "Mrs.", "Miss", "Dr.", "Professor"]
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <link rel="stylesheet" href="../static/add-lecturer.css" />
  <title>Lecture Attendance System</title>
</head>

<body>
  <header class="header">
    <a href="admin.php" id="header-text">Admin Dashboard</a>

    <div class="logout">
      <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
  </header>

  <div class="container">
    <div class="row h-100">
      <div class="col-2 aside">
        <?php include "layouts/side-bar.php" ?>
      </div>

      <div class="col-10 main-content">
        <h1 id="form-title">Add New Lecturer</h1>
        <form id="new-course-form" class="row">
          <div class="mb-3 col-md-2">
            <label for="Title" class="form-label">Title</label>
            <select class="form-select" name="title" id="title">
              <?php
              for ($i = 0; $i < sizeof($courses); $i++) {
                echo "<option value='title.id'>{$titles[$i]}</option>";
              }
              ?>
            </select>
          </div>

          <div class="mb-3 col-md-5">
            <label for="lastname" class="form-label">Lastname</label>
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname">
          </div>

          <div class="mb-3 col-md-5">
            <label for="firstname" class="form-label">Firstname</label>
            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname">
          </div>

          <div class="mb-3 col-md-12">
            <label for="department" class="form-label">Department</label>
            <input type="text" class="form-control" id="department" name="department" placeholder="Department">
          </div>

          <div class="mb-3 col-md-12">
            <label for="lecturer">Course</label>
            <select class="form-select" name="lecturer" id="lecturer">
              <?php
              for ($i = 0; $i < sizeof($courses); $i++) {
                echo "<option value='lecturer.id'>{$courses[$i]}</option>";
              }
              ?>
            </select>
          </div>

          <div class="col-md-12">
            <button type="submit" class="btn btn-success" id="submit-btn">Add Lecturer</button>
          </div>
        </form>
      </div>

      <!-- <div class="col-2 rhs"></div> -->
    </div>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
  </script>
</body>

</html>