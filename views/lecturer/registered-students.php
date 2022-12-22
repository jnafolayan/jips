<?php
require_once('../../lib/layout.php');
$title = "Registered Students";
$style = "../../static/stylesheets/index.css";

$students = [
  '180003888',
  '180003888',
  '180003888',
  '180003888',
]
?>
    <div class="container students">
      <h1>Students</h1>

      <p>Students in attendance for CSC 415 lecture on 21-12-22</p>

      <div class="row">
        <div class="col"><h6>Matric Numbers</h6></div>
      </div>

      <?php
foreach($students as $student){
  echo "<div class='row'>
  <div class='col'>" . $student . "</div>
</div>";
}
      ?>
      

    </div>
    