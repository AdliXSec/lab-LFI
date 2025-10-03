<?php
// TINGKAT 2: MENENGAH - Ada filter sederhana untuk '../'
echo "<h1>Level 2: Menengah</h1>";

if (isset($_GET['doc'])) {
    $doc = base64_decode($_GET['doc']);
    
    // Developer mencoba membuat filter untuk Path Traversal.
    $sanitized_doc = str_replace('../', '', $doc);
    
    // Namun, filter ini tidak cukup kuat.
    if (file_exists($sanitized_doc)) {
        echo "<code>Memuat dokumen: " . htmlspecialchars($sanitized_doc, ENT_QUOTES) . "</code><hr>";
        include($sanitized_doc);
    } else {
        echo "<p>Dokumen tidak ditemukan!</p>";
    }
} else {
    echo "<p>Gunakan parameter 'doc' untuk memuat dokumen.</p>";
}
?>