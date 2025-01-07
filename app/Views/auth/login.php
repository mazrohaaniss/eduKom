<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login to Your Account</h2>

    <!-- Menampilkan pesan error jika ada -->
    <?php if (session()->getFlashdata('error')) : ?>
        <div style="color: red;">
            <p><?= session()->getFlashdata('error') ?></p>
        </div>
    <?php endif; ?>

    <form action="/auth/loginCheck" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?= old('username') ?>" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="/register">Register here</a></p>
</body>
</html>
