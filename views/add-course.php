<?php
$lecturers = ["Lecturer 1", "Lecturer 2", "Lecturer 3", "Lecturer 4", "Lecturer 5"];
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <link rel="stylesheet" href="../static/add-course.css" />
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
        <h1 id="form-title">Add New Course</h1>
        <form id="new-course-form">
          <div class="mb-3">
            <label for="course-code" class="form-label">Course Code</label>
            <input type="text" class="form-control" id="course-code" name="course-code">
          </div>

          <div class="mb-3">
            <label for="course-title" class="form-label">Course Title</label>
            <input type="text" class="form-control" id="course-title" name="course-title">
          </div>

          <div class="mb-3">
            <label for="lecturer">Assigned Lecturer</label>
            <select class="form-select" name="lecturer" id="lecturer">
              <?php
              for ($i = 0; $i < sizeof($lecturers); $i++) {
                echo "<option value='lecturer.id'>{$lecturers[$i]}</option>";
              }
              ?>
            </select>
          </div>

          <button type="submit" class="btn btn-success" id="submit-btn">Add Course</button>
        </form>
      </div>

      <!-- <div class="col-2 rhs"></div> -->
    </div>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
  </script>
</body>

</html>