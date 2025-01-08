<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
</head>
<body>
    <h2>Lupa Password</h2>
    <p>Jika Anda lupa password, silakan hubungi admin untuk bantuan.</p>
    <a href="mailto:admin@example.com" style="text-decoration: none;">
        <button type="button">Hubungi Admin</button>
    </a>
    <br><br>
    <a href="<?= site_url('auth/login'); ?>">Kembali ke Login</a>
</body>
</html>