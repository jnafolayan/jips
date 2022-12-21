<?php
require_once('../lib/layout.php');
$title = "Lecture Attendance System";
$style = "../static/stylesheets/view-lecturers.css";
$lecturers = [];
for ($i = 1; $i < 21; $i++) {
  $lecturer = [
    "sn" => $i,
    "id" => "Lect{$i}_ID",
    "title" => "Lecturer{$i}_Title",
    "lastname" => "Lecturer{$i}_Lastname",
    "firstname" => "Lecturer{$i}_Firstname",
    "department" => "Lecturer{$i}_Department",
    "course" => "Lecturer{$i}_Course"
  ];
  array_push($lecturers, $lecturer);
}
?>

<?php include "layouts/header.php"; ?>

<div class="container">
  <div class="row h-100">
    <div class="col-2 aside">
      <?php include "layouts/side-bar.php" ?>
    </div>

    <div class="col-10 main-content">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">S/N</th>
            <th scope="col">Lastname</th>
            <th scope="col">Firstname</th>
            <th scope="col">Department</th>
            <th scope="col">Course</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          foreach($lecturers as $lecturer) {
            $view_btn = "<a href='view-lecturer-info.php' class='btn btn-primary'>View</a>";
            $content = <<< EOD
            <tr>
              <th scope="row">{$lecturer["sn"]}</th>
              <td>{$lecturer["lastname"]}</td>
              <td>{$lecturer["firstname"]}</td>
              <td>{$lecturer["department"]}</td>
              <td>{$lecturer["course"]}</td>
              <td>{$view_btn}</td>
            </tr>
            EOD;

            echo $content;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>