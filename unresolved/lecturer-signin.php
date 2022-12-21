<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="index.css" />
    <title>Sign In</title>
  </head>
  <body>
    <div class="container signin d-flex align-items-center justify-content-center flex-column">
      <h1>Sign In</h1>

      <form action="" class="d-flex flex-column align-items-center gap-4">
        <div>
          <input
            type="text"
            name="fullname"
            class="form-control"
            placeholder="Lecturer ID e.g 12006995"
          />
        </div>
        <div>
          <input
            type="password"
            name="matric-no"
            class="form-control"
            placeholder="Password"
          />
        </div>

        <input
          type="submit"
          value="Sign In"
          name="signin"
          class="btn btn-primary"
        />
      </form>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
