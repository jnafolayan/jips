<?php
require_once('../lib/layout.php');
$title = "Lecture Attendance System";
$style = "../static/stylesheets/view-reschedule-requests.css";
$requests = [];

for ($i = 1; $i < 21; $i++) {
  $request = [
    "id" => "Req{$i}_ID",
    "title" => "Request{$i}_Title",
    "solicitant" => "Request{$i}_Solicitant",
    "department" => "Request{$i}_Department",
    "course" => "Request{$i}_Course"
  ];
  array_push($requests, $request);
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
            <th scope="col">Title</th>
            <th scope="col">Solicitant</th>
            <th scope="col">Department</th>
            <th scope="col">Course</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          foreach($requests as $request) {
            $view_btn = "<a href='' class='btn btn-primary'>View</a>";
            $delete_btn = "<a href='' class='btn btn-danger'>Delete</a>";
            $content = <<< EOD
            <tr>
              <th scope="row">{$request["id"]}</th>
              <td>{$request["title"]}</td>
              <td>{$request["solicitant"]}</td>
              <td>{$request["department"]}</td>
              <td>{$request["course"]}</td>
              <td>{$view_btn}{$delete_btn}</td>
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