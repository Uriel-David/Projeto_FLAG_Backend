<?php
require './services/global.php';
require './services/verifyLogged.php';
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
  <header class="container-fluid mb-5">
    <?php include('./views/templates/navbar.php') ?>
  </header>

  <main class="container">
    <p>Container Principal</p>
  </main>

  <?php @include('./views/templates/footer.php'); ?>

  <script src="../vendor/components/jquery/jquery.min.js"></script>
  <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>