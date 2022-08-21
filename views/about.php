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
  <header class="container-fluid text-center mb-5">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/navbar.php'); ?>
  </header>

  <main class="container bg-custom mb-3">
    <div class="container mb-4">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ante enim, tristique condimentum orci quis, ullamcorper sodales metus. Curabitur suscipit sagittis tellus, aliquam scelerisque ipsum ultricies et. Duis hendrerit lobortis ligula, quis mollis nulla dapibus quis. Nam a finibus tortor, eu posuere leo. Fusce accumsan nunc vel sapien pulvinar, id tincidunt ligula tristique. In turpis nunc, congue in neque pharetra, rhoncus pulvinar erat. Maecenas massa nibh, condimentum eu euismod eget, suscipit vitae sem.

      Nulla condimentum massa in tellus venenatis, vel iaculis lorem euismod. Praesent sapien ipsum, rutrum sed egestas vel, ultricies at urna. Integer hendrerit quam neque, in elementum massa molestie vestibulum. Proin cursus elementum ante pellentesque ullamcorper. Vestibulum volutpat diam est, ut pharetra risus tincidunt in. Phasellus vehicula sit amet nulla eu tincidunt. Pellentesque eu magna non lectus iaculis malesuada sollicitudin a lectus. Mauris tempus tincidunt vulputate. Pellentesque tristique purus et dolor maximus finibus congue nec metus. Nam eget vestibulum eros. Ut non suscipit libero. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus ac ipsum orci. In tristique iaculis malesuada.
    </div>

    <div class="container mb-4 py-3 px-1 text-center">
      <img src="/views/assets/sample_kanban.png" alt="sample kanban" width="1280px" />
    </div>
  </main>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'); ?>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/bootstrapJS.php'); ?>
</body>

</html>