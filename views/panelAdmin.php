<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/global.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $_ENV['APP_NAME'] ?> - Administrator Panel</title>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/bootstrapCSS.php'); ?>
</head>

<body>
  <header class="container-fluid text-center mb-5">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/navbar.php'); ?>
    <div class="text-center mt-5">
      <h2>Admin Panel</h2>
    </div>
  </header>

  <main class="container bg-custom mb-4 mt-2">
    <div class="container table-responsive">
      <a href="/registerUserAdmin" class="btn btn-primary mb-2 mt-2">Create New User</a>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Name</th>
            <th scope="col">API Key</th>
            <th scope="col">Admin</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $user) : ?>
            <tr>
              <th scope="row"><?= $user['user_id'] ?></th>
              <td><?= $user['username'] ?></td>
              <td><?= $user['email'] ?></td>
              <td><?= $user['name'] ?></td>
              <td><?= $user['api_key'] ?></td>
              <td><?= $user['is_admin'] == 1 ? 'yes' : 'no' ?></td>
              <td><?= $user['createdAt'] ?></td>
              <td><?= $user['updatedAt'] ?></td>
              <td>
                <a href="/editUser?user_id=<?= $user['user_id'] ?>" class="btn btn-info mb-1">Update</a>
                <?php if ($user['user_id'] != 1) : ?>
                  <a href="/deleteUser?user_id=<?= $user['user_id'] ?>" class="btn btn-danger mt-1">Delete</a>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </main>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'); ?>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/templates/bootstrapJS.php'); ?>
</body>

</html>