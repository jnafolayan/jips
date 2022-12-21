<?php
require_once('../lib/layout.php');
$title = "Lecture Sign In";
$style = "../static/index.css";
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
  
        <form action="" class="d-flex flex-column align-items-center gap-4">
          <div>
            <input
              type="text"
              name="fullname"
              class="form-control"
              placeholder="Lecturer ID e.g 12006995"
            />
          </div>
          <div>
            <input
              type="password"
              name="matric-no"
              class="form-control"
              placeholder="Password"
            />
          </div>
  
          <input
            type="submit"
            value="Sign In"
            name="signin"
            class="btn btn-primary"
          />
        </form>
      </div>


    </div>
    </div>
    </div>


