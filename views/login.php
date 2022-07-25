<?php
require '../services/global.php';
require '../services/verifyLogged.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $_ENV['APP_NAME'] ?> - Sign in</title>
  <link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <header class="container-fluid text-center mb-5">
    <?php @include('./templates/navbar.php') ?>
    <?php @include('./templates/headerLogin.php'); ?>
  </header>

  <main class="container">
    <form method="post" action="/../routes/web.php/login">
      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Email for login in plataform.</div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" name="password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </main>

  <?php @include('./templates/footer.php'); ?>

  <script src="../vendor/components/jquery/jquery.min.js"></script>
  <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>