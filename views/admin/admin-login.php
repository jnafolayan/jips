<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <link rel="stylesheet" href="../../static/stylesheets/admin/admin-login.css">
  <link rel="stylesheet" href="<?php echo $style; ?>">
  <title>Lecture Attendance System</title>
</head>

<body>
  <header class="header">
    <a href="admin.php" id="header-text">Admin Dashboard</a>

    <div class="login">
      <a href="admin-login.php" class="btn btn-primary">Login</a>
    </div>
  </header>
  <div class="container d-flex justify-content-center">
    <div class="main-content">
      <h1>Login</h1>
      <form action="" method="POST">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="<?php echo $script; ?>"></script>
</body>

</html>