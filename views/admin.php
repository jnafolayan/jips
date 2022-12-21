<?php
require_once('../lib/layout.php');
$title = "<title>Lecture Attendance System</title>";
$style = "<link rel='stylesheet' href='../static/admin.css' />";
?>

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
      <h1>Content Section</h1>
    </div>
  </div>
</div>