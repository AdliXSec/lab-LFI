<?php
// TINGKAT 3: SULIT - Filter lebih ketat dan penambahan ekstensi .php
echo "<h1>Level 3: Sulit</h1>";

if (isset($_GET['module'])) {
    $module = base64_decode($_GET['module']);
    
    // Filter yang lebih kuat, memblokir path traversal dan PHP wrapper.
    if (strpos($module, '../') !== false || strpos($module, 'php://') !== false) {
        die("Aktivitas mencurigakan terdeteksi!");
    }
    
    // Developer memaksa penambahan ekstensi .php untuk keamanan.
    include('pages/' . $module . '.php');
} else {
    echo "<p>Gunakan parameter 'module' untuk memuat modul.</p>";
}
?>