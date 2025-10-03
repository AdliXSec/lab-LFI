<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Level 4: LFI via POST</title>
    <style>body { font-family: sans-serif; text-align: center; }</style>
</head>
<body>
    <h1>Level 4: Pilih Laporan untuk Ditampilkan</h1>
    <form action="controller/level4.php" method="POST">
        <select name="report_id">
            <option value="ZG9jcy9zYWxlcy50eHQ==">Laporan Penjualan</option>
            <option value="ZG9jcy9pbnZlbnRvcnkudHh0">Laporan Inventaris</option>
        </select>
        <br><br>
        <input type="submit" value="Tampilkan Laporan">
    </form>
    <p><b>Tujuan:</b> Baca isi file <code>secret/supersecret.txt</code>.</p>
</body>
</html>