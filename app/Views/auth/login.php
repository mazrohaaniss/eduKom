<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="<?= site_url('auth/loginAction'); ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>

    <a href="<?= site_url('auth/register'); ?>">Daftar</a> |
    <a href="<?= site_url('auth/lupapassword'); ?>">Lupa Password</a> <!-- Tombol Lupa Password -->

    <?php if (session()->getFlashdata('error')): ?>
        <p><?= session()->getFlashdata('error'); ?></p>
    <?php endif; ?>
</body>
</html>