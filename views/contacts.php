<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/global.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $_ENV['APP_NAME'] ?> - Contacts</title>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/bootstrapCSS.php'); ?>
</head>

<body>
  <header class="container-fluid mb-5">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/navbar.php') ?>
  </header>

  <main class="container bg-custom mb-3">
    <div class="container mb-4 text-center">
        <h1>Contatos</h1>
        <p>Caso exista algum problema e necessecite entrar em contato com a administração do site:</p>
        <ul id="list-contact">
            <li>Email: admin@contato.com</li>
            <li>Telemóvel: (+351) 999 999 999</li>
        </ul>
    </div>
  </main>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'); ?>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/bootstrapJS.php'); ?>
</body>

</html>