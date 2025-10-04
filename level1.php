<?php
// TINGKAT 1: DASAR - Tidak ada filter sama sekali.
echo "<h1>Level 1: Dasar</h1>";

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    // Kerentanan LFI klasik. Input langsung dimasukkan ke fungsi include.
    include($page);
} else {
    echo "<p>Gunakan parameter 'page' untuk memuat halaman.</p>";
}
?>