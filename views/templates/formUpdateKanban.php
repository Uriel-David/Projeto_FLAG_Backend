<div class="row limit-size">
    <div class="col-md-6 offset-md-3">
        <form method="POST" action="/updateBoard">
            <div class="mb-3">
                <label for="title_board" class="form-label">Board - Title:</label>
                <input type="text" class="form-control" name="title_board" id="title_board" value="<?= $board['title_board'] ?>" required>
            </div>
            <label for="category_board" class="form-label">Board - Category:</label>
            <select class="form-select mb-3" name="category_board" aria-label="Board Category">
                <option disabled>Categories</option>
                <option value="work" <?= $board['category_board'] == 'work' ? 'selected' : '' ?>>Work</option>
                <option value="personal" <?= $board['category_board'] == 'personal' ? 'selected' : '' ?>>Personal</option>
                <option value="other" <?= $board['category_board'] == 'other' ? 'selected' : '' ?>>Other</option>
            </select>
            <input type="hidden" class="board_id" name="board_id" value="<?= $board['board_id'] ?>">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>