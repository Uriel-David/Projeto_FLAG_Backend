<?php require '../scripts/global.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $_ENV['APP_NAME'] ?> - Sign up</title>
  <link href="../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <header class="container text-center mt-5">
    <?php @include('./templates/header.php'); ?>
    <ul class="nav nav-tabs justify-content-center">
      <li class="nav-item">
        <a class="nav-link" href="../index.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="register in plataform" href="#">Register</a>
      </li>
    </ul>
  </header>

  <main class="container">
    <form method="post" action="../controllers/register.php">
      <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" aria-describedby="nameHelp">
        <div id="nameHelp" class="form-text">Your name profile in plataform.</div>
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" class="form-control" id="username" aria-describedby="usernameHelp">
        <div id="usernameHelp" class="form-text">Your username in plataform.</div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Email for login in plataform.</div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </main>

  <?php @include('./templates/footer.php'); ?>

  <script src="../../vendor/components/jquery/jquery.min.js"></script>
  <script src="../../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>