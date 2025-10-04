<?php
// TINGKAT 5: Bypass Filter dengan Enkoding
echo "<h1>Level 5: Pengecek Dokumen</h1>";

if (isset($_GET['path'])) {
    $path = base64_decode($_GET['path']);
    
    // Developer menambahkan filter untuk '..', dan '\'
    if (preg_match('/\.\./', $path)) {
        die("Aktivitas mencurigakan terdeteksi! Karakter traversal tidak diizinkan.");
    }

    include($path); 
}
?>