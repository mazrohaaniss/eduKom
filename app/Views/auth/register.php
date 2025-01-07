<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Create an Account</h2>

    <!-- Menampilkan pesan error jika ada -->
    <?php if (session()->getFlashdata('errors')) : ?>
        <div style="color: red;">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/auth/save" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?= old('username') ?>" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <label for="role">Role:</label>
        <select name="role" id="role" required>
            <option value="admin" <?= old('role') == 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="user" <?= old('role') == 'user' ? 'selected' : '' ?>>User</option>
        </select><br><br>

        <button type="submit">Regis
