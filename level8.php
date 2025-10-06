<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>LFI Lab</title>
</head>
<body>
    <h1>Selamat Datang di LFI Lab</h1>
    <?php if (isset($_SESSION['loggedin'])): ?>
        <p>Anda sudah login. Lanjutkan ke <a href="vulnerable.php?file=docs/dokumen.txt">halaman LFI</a>.</p>
        <p><a href="controller/logout.php">Logout</a></p>
    <?php else: ?>
        <p>Silakan <a href="controller/login.php">login</a> untuk memulai.</p>
    <?php endif; ?>
</body>
</html>