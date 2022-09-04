<!-- Button trigger modal -->
<button type="button" class="btn btn-dark mb-1" data-bs-toggle="modal" data-bs-target="#modalTask-<?= $task['task_id'] ?>">
    <?= $task['task_title'] ?>
</button>

<!-- Modal -->
<div class="modal fade" id="modalTask-<?= $task['task_id'] ?>" tabindex="-1" aria-labelledby="titleTaskModal-<?= $task['task_id'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleTaskModal-<?= $task['task_id'] ?>"><?= $task['task_title'] ?></h5>
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
                <button class="btn btn-info" data-bs-target="#modalUpdateTask-<?= $task['task_id'] ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalUpdateTask-<?= $task['task_id'] ?>" aria-hidden="true" aria-labelledby="modalUpdateForm-<?= $task['task_id'] ?>" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateForm-<?= $task['task_id'] ?>">Update Task - <?= $task['task_title'] ?></h5>
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