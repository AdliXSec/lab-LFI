<?php
// TINGKAT 5: Bypass Filter dengan Enkoding
echo "<h1>Level 5: Pengecek Dokumen</h1>";

if (isset($_GET['path'])) {
    $path = base64_decode($_GET['path']);
    
    // Developer menambahkan filter untuk '..', '/', dan '\'
    if (preg_match('/\.\.|\/|\\\/', $path)) {
        die("Aktivitas mencurigakan terdeteksi! Karakter traversal tidak diizinkan.");
    }
    
    // Kerentanan: Filter tidak memperhitungkan semua jenis enkoding.
    // Penyerang bisa menggunakan double URL encoding untuk '..' -> %252e%252e
    // Namun, karena Base64, kita bisa fokus pada bypass logika.
    // Mari kita asumsikan tujuan include ada di dalam folder 'docs/'
    include('docs/' . $path); 
}
?>