<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/global.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $_ENV['APP_NAME'] ?> - User Panel</title>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/bootstrapCSS.php'); ?>
</head>

<body>
  <header class="container-fluid text-center mb-5">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/navbar.php'); ?>
    <div class="text-center mt-5">
      <h2>User Panel</h2>
    </div>
  </header>

  <main class="container bg-custom">
    <div class="container mb-3 py-2">
      <button class="btn btn-outline-primary mb-3 mt-3" id="btn-update-user">Update Info</button>
      
      <ul id="data-list-user" class="list-group">
        <li class="list-group-item">Name of User: <?= $user['name']; ?></li>
        <li class="list-group-item">Username account: <?= $user['username']; ?></li>
        <li class="list-group-item">Current email: <?= $user['email']; ?></li>
        <li class="list-group-item">API Key: <?= $user['api_key']; ?></li>
        <li class="list-group-item">User created at date: <?= $user['createdAt']; ?></li>
        <li class="list-group-item">Last update user info: <?= $user['createdAt']; ?></li>
      </ul>

      <form method="post" action="/updateUser?user_id=<?= $user['user_id'] ?>" id="form-update-user" class="register-form hide">
        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <input type="text" class="form-control" name="name" min="3" max="160" value="<?= $user['name'] ?>" required>
        </div>
        <div class="mb-3">
          <label for="username" class="form-label">Username:</label>
          <input type="text" class="form-control" name="username" min="1" max="120" value="<?= $user['username'] ?>" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password:</label>
          <input type="password" class="form-control" name="password" value="">
        </div>
        <div class="mb-3">
          <label for="confirmPassword" class="form-label">Confirm Password:</label>
          <input type="password" class="form-control" name="confirmPassword" value="">
        </div>
        <div class="mb-3">
          <label for="api_key" class="form-label">API Key:</label>
          <input type="text" class="form-control" name="api_key" value="<?= $user['api_key'] ?>" readonly disabled required>
        </div>
        <input type="hidden" class="user_id" name="user_id" value="<?= $user['user_id'] ?>">
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
      </form>
    </div>
  </main>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'); ?>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/bootstrapJS.php'); ?>
</body>

</html>