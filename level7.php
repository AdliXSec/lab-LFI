<?php
// TINGKAT 7: Log Poisoning - RCE via LFI
echo "<h1>Level 7: Analitik Pengunjung</h1>";
echo "<p>Fitur ini menampilkan log akses untuk dianalisis.</p>";

if (isset($_GET['log'])) {
    $log_file = base64_decode($_GET['log']);
    
    // Filter yang sangat lemah, hanya mengecek kata 'secret'.
    if (strpos($log_file, 'secret') !== false) {
        die("Akses ke direktori rahasia dilarang!");
    }
    
    // Kerentanan: Penyerang bisa mengarahkan include ke log akses Apache.
    // Jika penyerang bisa menyuntikkan kode PHP ke log, maka RCE bisa terjadi.
    include($log_file);
}
?>