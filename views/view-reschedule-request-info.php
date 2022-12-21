<?php
require_once('../lib/layout.php');
$style = "../static/stylesheets/view-reschedule-request-info.css";
$script = "../static/scripts/view-reschedule-request-info.js";

$request = [
  "id" => "Req{$i}_ID",
  "subject" => "Request{$i}_Subject",
  "solicitant" => "Request{$i}_Solicitant",
  "department" => "Request{$i}_Department",
  "course" => "Request{$i}_Course",
  "old-period" => "Request_Old_Period",
  "new-period" => "Request_New_Period",
];
?>

<div class="wrapper">
  <h1 id="form-title">Reschedule Request</h1>
  <form id="request-info" class="row" method="POST" action="edit-course-info.php">
    <input type="text" name="course-id" value="<?php echo $course["course_id"] ?>" hidden>
    <div class="mb-3 col-md-12">
      <label for="subject" class="form-label">Subject</label>
      <input type="text" class="form-control" id="subject" name="subject" value="<?php echo $request["subject"] ?>" disabled readonly>
    </div>
  
    <div class="mb-3 col-md-12">
      <label for="solicitant" class="form-label">Solicitant</label>
      <input type="text" class="form-control" id="solicitant" name="solicitant" value="<?php echo $request["solicitant"] ?>" disabled readonly>
    </div>
  
    <div class="mb-3 col-md-12">
      <label for="department" class="form-label">Department</label>
      <input type="text" class="form-control" id="department" name="department" value="<?php echo $request["department"] ?>" disabled readonly>
    </div>
  
    <div class="mb-3 col-md-12">
      <label for="course" class="form-label">Course</label>
      <input type="text" class="form-control" id="course" name="course" value="<?php echo $request["course"] ?>" disabled readonly>
    </div>
  
    <div class="mb-3 col-md-12">
      <label for="course" class="form-label">Previosuly Allocated Period</label>
      <input type="text" class="form-control" id="course" name="course" value="<?php echo $request["old-period"] ?>" disabled readonly>
    </div>

    <div class="mb-3 col-md-12">
      <label for="course" class="form-label">Newly Allocated Period</label>
      <input type="text" class="form-control" id="course" name="course" value="<?php echo $request["new-period"] ?>" disabled readonly>
    </div>
  
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6">
          <button type="submit" class="btn btn-success" id="submit-btn">Approve Request</button>
        </div>
        <div class="col-md-6">
          <button type="submit" class="btn btn-danger" id="delete-btn">Deny Request</button>
        </div>
      </div>
    </div>
  </form>
  </div>
</div>