<?php
// TINGKAT 6: Bypass Validasi Tipe File Gambar
if (isset($_GET['img'])) {
    $file = base64_decode($_GET['img']);
    
    // Developer hanya mengizinkan file dengan ekstensi gambar.
    $allowed_ext = ['png', 'jpg', 'jpeg', 'gif'];
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    
    // if (!in_array($ext, $allowed_ext)) {
    //     die("Hanya file gambar yang diizinkan!");
    // }
    
    // Kerentanan: Bisa dibypass dengan Null Byte (%00) di PHP versi lama.
    include($file);
}
?>