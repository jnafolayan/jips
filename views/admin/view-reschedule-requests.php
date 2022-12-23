<?php
require_once('../../lib/layout.php');
$style = "../../static/stylesheets/admin/view-reschedule-requests.css";

require_once('../../modules/Request.php');

$requests = Request::getRescheduleRequests();

// for ($i = 1; $i < 21; $i++) {
//   $request = [
//     "sn" => "{$i}",
//     "id" => "Req{$i}_ID",
//     "subject" => "Request{$i}_Subject",
//     "solicitant" => "Request{$i}_Solicitant",
//     "department" => "Request{$i}_Department",
//     "course" => "Request{$i}_Course"
//   ];
//   array_push($requests, $request);
// }
?>

<div class="wrapper">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">S/N</th>
        <th scope="col">New Day</th>
        <th scope="col">New Start Time</th>
        <th scope="col">New End Time</th>
        <th scope="col">Course ID</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // foreach ($requests as $request) {
      //   $view_btn = "<a href='view-reschedule-request-info.php' class='btn btn-primary'>View</a>";
      //   $content = <<< EOD
      //         <tr>
      //           <th scope="row">{$request["sn"]}</th>
      //           <td>{$request["subject"]}</td>
      //           <td>{$request["solicitant"]}</td>
      //           <td>{$request["department"]}</td>
      //           <td>{$request["course"]}</td>
      //           <td>{$view_btn}</td>
      //         </tr>
      //         EOD;

      //   echo $content;
      // }

      foreach ($requests as $request) {
        $view_btn = "<a href='view-reschedule-request-info.php' class='btn btn-primary'>View</a>";
        $content = <<< EOD
              <tr>
                <th scope="row">{$request["id"]}</th>
                <td>{$request["day"]}</td>
                <td>{$request["startTime"]}</td>
                <td>{$request["endTime"]}</td>
                <td>{$request["courseID"]}</td>
                <td>{$view_btn}</td>
              </tr>
              EOD;

        echo $content;
      }
      ?>
    </tbody>
  </table>
</div>