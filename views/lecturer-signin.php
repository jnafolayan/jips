<?php
require_once('../lib/layout.php');
$title = "Lecture Sign In";
$style = "../static/index.css";

$loginError = null;

require_once('../modules/Auth.php');

if (isset($_POST["signin"])) {
  $lecturerID = $_POST["lecturerID"];
  $password = $_POST["password"];

  $result = Auth::lecturerSignIn($lecturerID, $password);
  if ($result) {
    header('location:view-lectures.php');
  } else {
    $loginError = 'Unable to sign in';
  }
}
?>

<?php include "layouts/header.php"; ?>

<div class="container">
  <div class="row h-100">
    <div class="col-2">
      <?php include "layouts/side-bar.php" ?>
    </div>

    <div class="col-10">
      <div class="container signin d-flex align-items-center justify-content-center flex-column">
        <h1>Sign In</h1>

        <?php
        if ($loginError) {
          echo "<p class='text-danger'>$loginError</p>";
        }
        ?>

        <form action="" method="POST" class="d-flex flex-column align-items-center gap-4">
          <div>
            <input type="text" name="lecturerID" class="form-control" placeholder="Lecturer ID e.g 12006995" required />
          </div>
          <div>
            <input type="password" name="password" class="form-control" placeholder="Password" required />
          </div>

          <input type="submit" value="Sign In" name="signin" class="btn btn-primary" />
        </form>
      </div>


    </div>
  </div>
</div>