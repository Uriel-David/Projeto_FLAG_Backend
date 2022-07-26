<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/global.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $_ENV['APP_NAME'] ?> - Administrator Panel</title>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/bootstrapCSS.php'); ?>
</head>

<body>
  <a href="/../routes/web.php/logout">Logout</a>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/bootstrapJS.php'); ?>
</body>

</html>