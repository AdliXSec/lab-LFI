<?php
// TINGKAT 4: LFI via POST - Parameter dikirim melalui metode POST.
echo "<h1>Level 4: Hasil Laporan</h1>";

if (isset($_POST['report_id'])) {
    $report_file = base64_decode($_POST['report_id']);
    
    // Kerentanan LFI sama seperti level 1, tetapi input berasal dari POST.
    // Ini sering terlewat oleh scanner otomatis yang hanya menguji GET.
    echo "<code>Menampilkan: " . htmlspecialchars($report_file, ENT_QUOTES) . "</code><hr>";
    include("../".$report_file);
} else {
    echo "<p>Silakan pilih laporan dari <a href='level4.html'>formulir</a>.</p>";
}
?>