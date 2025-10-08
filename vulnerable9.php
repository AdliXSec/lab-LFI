<?php
// Mulai sesi
session_start();

// Cek apakah pengguna sudah login. Jika tidak, paksa keluar.
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: controller/login9.php");
    exit;
}

// Inilah kerentanan LFI yang sebenarnya
if (isset($_GET['file'])) {
    if(strpos($_GET['file'], '../') !== false) {
        die("Aktivitas mencurigakan terdeteksi! Karakter traversal tidak diizinkan.");
    }
    $data = str_replace('__/', '../', $_GET['file']);
    echo $data."<br>";
    include($data);
}
?>
<hr>
<p>Anda bisa logout <a href="controller/logout.php">di sini</a>.</p>