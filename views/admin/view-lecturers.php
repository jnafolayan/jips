<?php
require_once('../../lib/layout.php');
$style = "../../static/stylesheets/admin/view-lecturers.css";

require_once('../../modules/Lecturer.php');
require_once('../../modules/Course.php');

$lecturers = Lecturer::getLecturers();

?>

<div class="wrapper">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">S/N</th>
        <th scope="col">Lastname</th>
        <th scope="col">Firstname</th>
        <th scope="col">Department</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($lecturers as $k => $lecturer) {
        $eid = $lecturer["employeeID"];
        $view_btn = "<a href='view-lecturer-info.php?eid=$eid' class='btn btn-primary'>View</a>";
        $k = $k + 1;
        $content = <<< EOD
              <tr>
                <td scope="row">{$k}</td>
                <td>{$lecturer["lastName"]}</td>
                <td>{$lecturer["firstName"]}</td>
                <td>{$lecturer["departmentName"]}</td>
                <td>{$view_btn}</td>
              </tr>
              EOD;
  
        echo $content;
      }
      ?>
    </tbody>
  </table>
</div>