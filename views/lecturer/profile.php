<?php
require_once('../../lib/layout.php');
$style = "../../static/stylesheets/lecturer/profile.css";
?>

<div class="wrapper">
  <div class="container profile">
    <h1>Profile</h1>
  
    <div class="d-flex profile-info">
      <div class="picture">
        <img src="../../static/images/avatar.png" alt="" />
      </div>
  
      <div class="details">
        <p class="fields">ID:</p>
        <p class="values">12366778</p>
  
        <p class="fields">Name:</p>
        <p class="values">Ikeoluwapo Are</p>
  
        <p class="fields">Phone:</p>
        <p class="values">0405068886</p>
  
        <p class="fields">Email:</p>
        <p class="values">johndoe@mmm.co</p>
      </div>
    </div>
  
    <div class="courses">
      <h4>Courses:</h4>
  
      <div class="table">
        <div class="row">
          <div class="col col-3">
            <h6>Course code</h6>
          </div>
          <div class="col col-3">
            <h6>Course title</h6>
          </div>
        </div>
        <div class="row">
          <div class="col col-3">CSC 415</div>
          <div class="col col-3">Web Design</div>
        </div>
        <div class="row">
          <div class="col col-3">CSC 410</div>
          <div class="col col-3">Database</div>
        </div>
      </div>
    </div>
  </div>
</div>