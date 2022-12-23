<ul>
  <li><a href="lectures.php">Lectures</a></li>
  <li><a href="courses.php">Courses</a></li>
  <li><a href="lecturer-profile.php">Profile</a></li>
  <?php 
  if (isset($_SESSION['role']) && $_SESSION['role'] === 'hod') {
    echo "<li><a href='/views/admin/view-lectures.php'>View Lectures</a></li>";
  }
  ?>
</ul>