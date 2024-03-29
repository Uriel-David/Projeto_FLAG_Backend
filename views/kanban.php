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
  <header class="container-fluid text-center mb-5">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/navbar.php'); ?>
    <div class="text-center mt-5">
      <h2>Kanban Board</h2>
    </div>
  </header>

  <main class="bg-custom">
    <?php if (empty($boards)) : ?>
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/formKanban.php'); ?>
    <?php else : ?>
      <div class="container text-center">
        <p>
          <button class="btn btn-dark mt-4 mb-4" type="button" data-bs-toggle="collapse" data-bs-target="#formKanbanBoard" aria-expanded="false" aria-controls="formKanbanBoard">Boards Kanban</button>

          <button class="btn btn-dark mt-4 mb-4" data-bs-toggle="collapse" href="#kanbanBoards" role="button" aria-expanded="false" aria-controls="kanbanBoards">Create New Board</button>
        </p>
      </div>
      <div class="container-fluid text-center py-2">
        <div class="container mt-2 mb-1">
          <div class="collapse multi-collapse" id="formKanbanBoard">
            <?php foreach ($boards as $board) : ?>
              <div class="card card-body mb-3">
                <div class="row">
                  <h4><?= $board['title_board'] .' (' . $board['category_board'] . ')' ?></h4>
                  
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-light mb-1" data-bs-toggle="modal" data-bs-target="#formModalTaskCreate<?= $board['board_id'] ?>">
                    Create New Task
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="formModalTaskCreate<?= $board['board_id'] ?>" tabindex="-1" aria-labelledby="titleFormTaskModal<?= $board['board_id'] ?>" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="titleFormTaskModal<?= $board['board_id'] ?>">Form - New Task</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/formTasks.php'); ?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col">
                    <h5>Backlog</h5>
                    <?php foreach ($tasks as $task) : ?>
                      <?php if ($task['task_category'] == 'backlog' && $board['board_id'] == $task['board_id']) : ?>
                        <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/modalTasks.php'); ?>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </div>
                  <div class="col">
                    <h5>Pending</h5>
                    <?php foreach ($tasks as $task) : ?>
                      <?php if ($task['task_category'] == 'pending' && $board['board_id'] == $task['board_id']) : ?>
                        <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/modalTasks.php'); ?>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </div>
                  <div class="col">
                    <h5>In Progress</h5>
                    <?php foreach ($tasks as $task) : ?>
                      <?php if ($task['task_category'] == 'inProgress' && $board['board_id'] == $task['board_id']) : ?>
                        <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/modalTasks.php'); ?>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </div>
                  <div class="col">
                    <h5>Completed</h5>
                    <?php foreach ($tasks as $task) : ?>
                      <?php if ($task['task_category'] == 'completed' && $board['board_id'] == $task['board_id']) : ?>
                        <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/modalTasks.php'); ?>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </div>
                  
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-info mt-4" data-bs-toggle="modal" data-bs-target="#formModalUpdateBoard<?= $board['board_id'] ?>">
                    Update Board
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="formModalUpdateBoard<?= $board['board_id'] ?>" tabindex="-1" aria-labelledby="titleFormUpdateBoardModal-<?= $board['board_id'] ?>" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="titleFormUpdateBoardModal-<?= $board['board_id'] ?>">Form - Update <?= $board['title_board'] ?></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/formUpdateKanban.php'); ?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#formModalDeleteBoard<?= $board['board_id'] ?>">
                    &Oslash; Delete Board
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="formModalDeleteBoard<?= $board['board_id'] ?>" tabindex="-1" aria-labelledby="titleFormDeleteBoardModal-<?= $board['board_id'] ?>" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="titleFormDeleteBoardModal-<?= $board['board_id'] ?>">Deletar Board</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete this Board?
                        </div>
                        <div class="modal-footer">
                          <form method="POST" action="/deleteBoard" id="delete-board-form">
                            <input type="hidden" class="board_id" name="board_id" value="<?= $board['board_id'] ?>" />
                            <button type="submit" id="delete-board-submit" class="btn btn-danger d-block">&Oslash; Delete Board</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="container mt-2 mb-3">
          <div class="collapse multi-collapse" id="kanbanBoards">
            <div class="card card-body">
              <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/formKanban.php'); ?>
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