<div class="row limit-size">
    <div class="col-md-6 offset-md-3">
        <form method="POST" action="/createTask">
            <div class="mb-3">
                <label for="title_task" class="form-label">Task - Title:</label>
                <input type="text" class="form-control" name="title_task" id="title_task" required />
            </div>
            <div class="mb-3">
                <label for="description_task" class="form-label">Task - Description:</label>
                <textarea type="text" class="form-control" name="description_task" id="description_task" required></textarea>
            </div>
            <label for="category_task" class="form-label">Task - Category:</label>
            <select class="form-select mb-3" name="category_task" aria-label="Task Category">
                <option value="backlog" selected>Backlog</option>
                <option value="pending">Pending</option>
                <option value="inProgress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
            <input type="hidden" class="board_id" name="board_id" value="<?= $board['board_id'] ?>">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>