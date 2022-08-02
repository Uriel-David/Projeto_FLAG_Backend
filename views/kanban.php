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
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/navbar.php'); ?>
    <div class="text-center">
      <h2>Kanban Board</h2>
      <a href="/../routes/web.php/logout">Logout</a>
    </div>
  </header>

  <main>
    <?php if (empty($boards)) : ?>
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/formKanban.php'); ?>
    <?php else : ?>
      <div class="container text-center">
        <p>
          <button class="btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#formKanbanBoard" aria-expanded="false" aria-controls="formKanbanBoard">Boards Kanban</button>

          <button class="btn btn-dark" data-bs-toggle="collapse" href="#kanbanBoards" role="button" aria-expanded="false" aria-controls="kanbanBoards">Create New Board</button>
        </p>
      </div>
      <div class="container-fluid text-center">
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
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-light mb-1" data-bs-toggle="modal" data-bs-target="#modalTaskBacklog<?= $task['task_id'] ?>">
                          <?= $task['task_title'] ?>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalTaskBacklog<?= $task['task_id'] ?>" tabindex="-1" aria-labelledby="titleTaskBacklogModal<?= $task['task_id'] ?>" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="titleTaskBacklogModal<?= $task['task_id'] ?>"><?= $task['task_title'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <?= $task['task_description'] ?>
                              </div>
                              <div class="modal-footer">
                                <form method="POST" action="/../routes/web.php/deleteTask">
                                    <input type="hidden" class="board_id" name="board_id" value="<?= $board['board_id'] ?>" />
                                    <input type="hidden" class="task_id" name="task_id" value="<?= $task['task_id'] ?>" />
                                    <button type="submit" class="btn btn-danger">&Oslash; Delete</button>
                                </form>
                                <button class="btn btn-info" data-bs-target="#modalUpdateTaskBacklog<?= $task['task_id'] ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Update</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal fade" id="modalUpdateTaskBacklog<?= $task['task_id'] ?>" aria-hidden="true" aria-labelledby="modalUpdateFormBacklog<?= $task['task_id'] ?>" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalUpdateFormBacklog<?= $task['task_id'] ?>">Update Task - <?= $task['task_title'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/formUpdateTasks.php'); ?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </div>
                  <div class="col">
                    <h5>Pending</h5>
                    <?php foreach ($tasks as $task) : ?>
                      <?php if ($task['task_category'] == 'pending' && $board['board_id'] == $task['board_id']) : ?>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-light mb-1" data-bs-toggle="modal" data-bs-target="#modalTaskPending<?= $task['task_id'] ?>">
                          <?= $task['task_title'] ?>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalTaskPending<?= $task['task_id'] ?>" tabindex="-1" aria-labelledby="titleTaskPendingModal<?= $task['task_id'] ?>" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="titleTaskPendingModal<?= $task['task_id'] ?>"><?= $task['task_title'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <?= $task['task_description'] ?>
                              </div>
                              <div class="modal-footer">
                                <form method="POST" action="/../routes/web.php/deleteTask">
                                    <input type="hidden" class="board_id" name="board_id" value="<?= $board['board_id'] ?>" />
                                    <input type="hidden" class="task_id" name="task_id" value="<?= $task['task_id'] ?>" />
                                    <button type="submit" class="btn btn-danger">&Oslash; Delete</button>
                                </form>
                                <button class="btn btn-info" data-bs-target="#modalUpdateTaskPending<?= $task['task_id'] ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Update</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal fade" id="modalUpdateTaskPending<?= $task['task_id'] ?>" aria-hidden="true" aria-labelledby="modalUpdateFormPending<?= $task['task_id'] ?>" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalUpdateFormPending<?= $task['task_id'] ?>">Update Task - <?= $task['task_title'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/formUpdateTasks.php'); ?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </div>
                  <div class="col">
                    <h5>In Progress</h5>
                    <?php foreach ($tasks as $task) : ?>
                      <?php if ($task['task_category'] == 'inProgress' && $board['board_id'] == $task['board_id']) : ?>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-light mb-1" data-bs-toggle="modal" data-bs-target="#modalTaskInProgress<?= $task['task_id'] ?>">
                          <?= $task['task_title'] ?>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalTaskInProgress<?= $task['task_id'] ?>" tabindex="-1" aria-labelledby="titleTaskInProgressModal<?= $task['task_id'] ?>" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="titleTaskInProgressModal<?= $task['task_id'] ?>"><?= $task['task_title'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <?= $task['task_description'] ?>
                              </div>
                              <div class="modal-footer">
                                <form method="POST" action="/../routes/web.php/deleteTask">
                                    <input type="hidden" class="board_id" name="board_id" value="<?= $board['board_id'] ?>" />
                                    <input type="hidden" class="task_id" name="task_id" value="<?= $task['task_id'] ?>" />
                                    <button type="submit" class="btn btn-danger">&Oslash; Delete</button>
                                </form>
                                <button class="btn btn-info" data-bs-target="#modalUpdateTaskInProgress<?= $task['task_id'] ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Update</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal fade" id="modalUpdateTaskInProgress<?= $task['task_id'] ?>" aria-hidden="true" aria-labelledby="modalUpdateFormInProgress<?= $task['task_id'] ?>" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalUpdateFormInProgress<?= $task['task_id'] ?>">Update Task - <?= $task['task_title'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/formUpdateTasks.php'); ?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </div>
                  <div class="col">
                    <h5>Completed</h5>
                    <?php foreach ($tasks as $task) : ?>
                      <?php if ($task['task_category'] == 'completed' && $board['board_id'] == $task['board_id']) : ?>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-light mb-1" data-bs-toggle="modal" data-bs-target="#modalTaskCompleted<?= $task['task_id'] ?>">
                          <?= $task['task_title'] ?>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalTaskCompleted<?= $task['task_id'] ?>" tabindex="-1" aria-labelledby="titleTaskCompletedModal<?= $task['task_id'] ?>" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="titleTaskCompletedModal<?= $task['task_id'] ?>"><?= $task['task_title'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <?= $task['task_description'] ?>
                              </div>
                              <div class="modal-footer">
                                <form method="POST" action="/../routes/web.php/deleteTask">
                                    <input type="hidden" class="board_id" name="board_id" value="<?= $board['board_id'] ?>" />
                                    <input type="hidden" class="task_id" name="task_id" value="<?= $task['task_id'] ?>" />
                                    <button type="submit" class="btn btn-danger">&Oslash; Delete</button>
                                </form>
                                <button class="btn btn-info" data-bs-target="#modalUpdateTaskCompleted<?= $task['task_id'] ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Update</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal fade" id="modalUpdateTaskCompleted<?= $task['task_id'] ?>" aria-hidden="true" aria-labelledby="modalUpdateFormCompleted<?= $task['task_id'] ?>" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalUpdateFormCompleted<?= $task['task_id'] ?>">Update Task - <?= $task['task_title'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/formUpdateTasks.php'); ?>
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php endif; ?>
                    <?php endforeach; ?>
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