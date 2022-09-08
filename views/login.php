<?php
require $_SERVER['DOCUMENT_ROOT'] . '/services/global.php';
require $_SERVER['DOCUMENT_ROOT'] . '/services/verifyLogged.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $_ENV['APP_NAME'] ?> - Sign in</title>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/bootstrapCSS.php'); ?>
</head>

<body>
  <header class="container-fluid text-center mb-5">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/navbar.php') ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/headerLogin.php'); ?>
  </header>

  <main class="container bg-custom mb-3">
    <form method="post" action="/homeKanban" class="py-2 px-2">
      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" required>
        <div id="emailHelp" class="form-text">Email for login in plataform.</div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" name="password" min="8" required>
      </div>
      <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form>
  </main>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'); ?>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/bootstrapJS.php'); ?>
</body>

</html>