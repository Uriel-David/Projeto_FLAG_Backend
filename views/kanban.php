<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/global.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $_ENV['APP_NAME'] ?> - Kanban Board</title>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/bootstrapCSS.php'); ?>
</head>

<body>
  <header class="container text-center mb-5">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/navbar.php') ?>
    <div class="text-center">
      <h2>Kanban Board</h2>
      <a href="/../routes/web.php/logout">Logout</a>
    </div>
  </header>

  <main>
    <?php if (!empty($kanbanBoards)) : ?>
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/formKanban.php'); ?>
    <?php else : ?>
      <div class="container text-center">
        <p>
          <a class="btn btn-primary" data-bs-toggle="collapse" href="#formKanbanBoard" role="button" aria-expanded="false" aria-controls="formKanbanBoard">Form: Create New Board</a>
          <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#kanbanBoards" aria-expanded="false" aria-controls="kanbanBoards">Boards Kanban</button>
        </p>
      </div>
      <div class="container text-center">
        <div class="container mt-2 mb-1">
          <div class="collapse multi-collapse" id="formKanbanBoard">
            <div class="card card-body">
              <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/formKanban.php'); ?>
            </div>
          </div>
        </div>
        <div class="container mt-2 mb-1">
          <div class="collapse multi-collapse" id="kanbanBoards">
            <div class="card card-body">
              Boards Kanban.
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </main>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'); ?>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/bootstrapJS.php'); ?>
</body>

</html>