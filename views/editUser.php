<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/services/global.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $_ENV['APP_NAME'] ?> - Update User</title>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/bootstrapCSS.php'); ?>
</head>

<body>
  <header class="container-fluid text-center mb-5">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/navbar.php') ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/headerLogin.php'); ?>
  </header>

  <main class="bg-custom mb-4">
    <div class="container form-edit-user">
      <form method="post" action="/updateUser?user_id=<?= $id ?>" class="register-form py-2">
        <div class="mb-3">
          <label for="user_id" class="form-label">ID:</label>
          <input type="text" class="form-control" name="user_id" min="3" max="160" value="<?= $user['user_id'] ?>" readonly disabled required>
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <input type="text" class="form-control" name="name" min="3" max="160" value="<?= $user['name'] ?>" required>
        </div>
        <div class="mb-3">
          <label for="username" class="form-label">Username:</label>
          <input type="text" class="form-control" name="username" min="1" max="120" value="<?= $user['username'] ?>" required>
        </div>
        <div class="mb-3">
          <label for="is_admin" class="form-label">State User:</label>
          <select class="form-select" name="is_admin">
            <option disabled>State User:</option>
            <option value="1" <?= $user['is_admin'] == 1 ? 'selected' : '' ?>>Admin</option>
            <option value="0" <?= $user['is_admin'] == 0 ? 'selected' : '' ?> <?= $user['user_id'] == 1 ? 'disabled' : '' ?>>Common</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password:</label>
          <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3">
          <label for="confirmPassword" class="form-label">Confirm Password:</label>
          <input type="password" class="form-control" name="confirmPassword">
        </div>
        <div class="mb-3">
          <label for="api_key" class="form-label">API Key:</label>
          <input type="text" class="form-control" name="api_key" value="<?= $user['api_key'] ?>" readonly disabled required>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>

        <input type="hidden" class="user_id" name="user_id" value="<?= $user['user_id'] ?>">
        <a href="/getUsers" class="btn btn-secundary mb-2 mr-auto">back</a>
      </form>
    </div>
  </main>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'); ?>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/bootstrapJS.php'); ?>
</body>

</html>