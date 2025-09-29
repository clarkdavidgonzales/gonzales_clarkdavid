<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <h2>Login</h2>
  <?php if (!empty($error)): ?>
    <p style="color:red;"><?= $error ?></p>
  <?php endif; ?>

  <form method="POST" action="<?= site_url('auth/login') ?>">
    <label>Username:</label>
    <input type="text" name="username" required><br><br>

    <label>Password:</label>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
  </form>
</body>
</html>
