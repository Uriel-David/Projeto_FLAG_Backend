<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/services/global.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $_ENV['APP_NAME'] ?> - Register User</title>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/bootstrapCSS.php'); ?>
</head>

<body>
  <header class="container-fluid text-center mb-5">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/navbar.php') ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/headerLogin.php'); ?>
  </header>

  <main class="container bg-custom mb-2">
    <div class="container form-edit-user py-2">
      <form method="post" action="/register" class="register-form">
        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <input type="text" class="form-control" name="name" min="3" max="160" required>
        </div>
        <div class="mb-3">
          <label for="username" class="form-label">Username:</label>
          <input type="text" class="form-control" name="username" min="1" max="120" required>
        </div>
        <div class="mb-3">
          <label for="is_admin" class="form-label">State User:</label>
          <select class="form-select" name="is_admin">
            <option disabled>State User:</option>
            <option value="1">Admin</option>
            <option value="0" selected>Common</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password:</label>
          <input type="password" class="form-control" name="password" min="8" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Confirm Password:</label>
          <input type="password" class="form-control" name="confirmPassword" min="8" required>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>

        <a href="/getUsers" class="btn btn-secundary mb-2 mr-auto">back</a>
      </form>
    </div>
  </main>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'); ?>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/bootstrapJS.php'); ?>
</body>

</html>