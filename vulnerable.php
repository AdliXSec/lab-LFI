<?php
// Mulai sesi
session_start();

// Cek apakah pengguna sudah login. Jika tidak, paksa keluar.
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: controller/login.php");
    exit;
}

// Inilah kerentanan LFI yang sebenarnya
if (isset($_GET['file'])) {
    include($_GET['file']);
}
?>
<hr>
<p>Anda bisa logout <a href="controller/logout.php">di sini</a>.</p>