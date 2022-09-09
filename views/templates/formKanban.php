<div class="row limit-size">
    <div class="col-md-6 offset-md-3">
        <form method="POST" action="/createBoard">
            <div class="mb-3">
                <label for="title_board" class="form-label">Board - Title:</label>
                <input type="text" class="form-control" name="title_board" id="title_board" required>
            </div>
            <label for="category_board" class="form-label">Board - Category:</label>
            <select class="form-select mb-3" name="category_board" aria-label="Board Category">
                <option disabled>Categories</option>
                <option value="work">Work</option>
                <option value="personal">Personal</option>
                <option value="other">Other</option>
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>