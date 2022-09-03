<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/global.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $_ENV['APP_NAME'] ?> - User Panel</title>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/bootstrapCSS.php'); ?>
</head>

<body>
  <header class="container-fluid text-center mb-5">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/navbar.php'); ?>
    <div class="text-center mt-5">
      <h2>User Panel</h2>
    </div>
  </header>

  <main class="container bg-custom">
    <div class="container mb-3 py-2">
      <ul class="list-group">
        <li class="list-group-item">Name of User: <?= $user['name']; ?></li>
        <li class="list-group-item">Username account: <?= $user['username']; ?></li>
        <li class="list-group-item">Email current in account: <?= $user['email']; ?></li>
        <li class="list-group-item">API Key: <?= $user['api_key']; ?></li>
        <li class="list-group-item">User created at date: <?= $user['createdAt']; ?></li>
        <li class="list-group-item">Last update user info: <?= $user['createdAt']; ?></li>
      </ul>
    </div>
  </main>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'); ?>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/bootstrapJS.php'); ?>
</body>

</html>