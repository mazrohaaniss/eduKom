<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="post" action="<?= site_url('auth/registerAction'); ?>">
        <label for="nama_lengkap">Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" required><br>

        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="confirm_password">Konfirmasi Password:</label>
        <input type="password" name="confirm_password" required><br>

        <button type="submit">Daftar</button>
    </form>

    <a href="<?= site_url('auth/login'); ?>">Sudah punya akun? Login</a>

    <?php if (session()->getFlashdata('error')): ?>
        <p><?= session()->getFlashdata('error'); ?></p>
    <?php endif; ?>
</body>
</html>