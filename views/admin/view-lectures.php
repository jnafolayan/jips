<?php
require_once('../../lib/layout.php');
require_once('../../modules/Lecture.php');

$style = "../../static/stylesheets/admin/view-lectures.css";

$lectures = Lecture::getLectures();
?>

<div class="wrapper">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">S/N</th>
        <th scope="col">Course</th>
        <th scope="col">Day</th>
        <th scope="col">Start Time</th>
        <th scope="col">End Time</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($lectures as $k => $lecture) {
        $i = $k + 1;
        $lID = $lecture['id'];
        $view_btn = "<a href='view-lecture-info.php?id=$lID' class='btn btn-primary'>View</a>";
        $content = <<< EOD
              <tr>
                <td scope="row">{$i}</td>
                <td>{$lecture["title"]}</td>
                <td>{$lecture["day"]}</td>
                <td>{$lecture["startTime"]}</td>
                <td>{$lecture["endTime"]}</td>
                <td>{$view_btn}</td>
              </tr>
              EOD;

        echo $content;
      }
      ?>
    </tbody>
  </table>
</div>