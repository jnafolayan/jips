<?php
$title = "Lecture Sign In";
$loginError = null;

require_once('../../modules/Auth.php');

if (isset($_POST["signin"])) {
  $lecturerID = $_POST["lecturerID"];
  $password = $_POST["password"];

  $result = Auth::lecturerSignIn($lecturerID, $password);
  if ($result) {
    header('location:lectures.php');
  } else {
    $loginError = 'Unable to sign in';
  }
}
?>

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
    <title>Sign In</title>
  </head>
  <body>
      <div class="container signin d-flex align-items-center justify-content-center flex-column">
        <h1>Sign In</h1>

        <form action="" method="POST" class="d-flex flex-column align-items-center gap-4">
          <div>
            <input type="text" name="lecturerID" class="form-control" placeholder="Lecturer ID e.g 1206995" required />
          </div>
          <div>
            <input type="password" name="password" class="form-control" placeholder="Password" required />
          </div>

          <input type="submit" value="Sign in" name="signin" class="btn btn-primary" />

        <?php
        if ($loginError) {
          echo "<p class='text-danger'>$loginError</p>";
        }
        ?>
        </form>
      </div>


      <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>