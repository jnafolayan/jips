<?php
session_start();
require_once(__DIR__.'/../../lib/protect.php');
protect('lecturer');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <link rel="stylesheet" href="../../static/stylesheets/lecturer/layout.css">
  <link rel="stylesheet" href="<?php echo $style; ?>">
  <title>Lecture Attendance System</title>
</head>

<body>
  <?php include "partials/header.php" ?>
  <div class="container">
    <div class="row content-row">
      <div class="col-2 aside">
        <?php include "partials/side-bar.php" ?>
      </div>

      <div class="col-10 main-content">
        <?php echo $content; ?>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="<?php echo $script; ?>"></script>
</body>

</html>