<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/global.php';
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
  <header class="container-fluid mb-5">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/navbar.php') ?>
  </header>

  <main class="container bg-custom mb-3">
    <div class="container mb-4 text-center">
        <h1>Error 404 - Página solicitada não existe</h1>
        <p>Selecione alguns dos links abaixo ou no nosso header para navegar novamente pelo site.</p>
        <a href="/" class="btn btn-primary mb-2">Home</a>
        <a href="/login" class="btn btn-primary mb-2">Login</a>
    </div>
  </main>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'); ?>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/bootstrapJS.php'); ?>
</body>

</html>