<?php
require_once('../../lib/layout.php');
$style = "../../static/stylesheets/admin/view-lectures.css";

$lectures = [];
for ($i = 1; $i < 21; $i++) {
  $lecture = [
    "sn" => "{$i}",
    "course" => "Course_Code",
    "day" => "Day",
    "start_time" => "Start-Time",
    "end_time" => "End-Time",
  ];

  array_push($lectures, $lecture);
}
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
      foreach ($lectures as $lecture) {
        $view_btn = "<a href='view-lecture-info.php' class='btn btn-primary'>View</a>";
        $content = <<< EOD
              <tr>
                <td scope="row">{$lecture["sn"]}</td>
                <td>{$lecture["course"]}</td>
                <td>{$lecture["day"]}</td>
                <td>{$lecture["start_time"]}</td>
                <td>{$lecture["end_time"]}</td>
                <td>{$view_btn}</td>
              </tr>
              EOD;

        echo $content;
      }
      ?>
    </tbody>
  </table>
</div>