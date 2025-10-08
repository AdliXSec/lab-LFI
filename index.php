<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LFI Lab Sederhana</title>
    <style>
        body { font-family: sans-serif; container:-fluid; text-align: center; }
        a { display: block; margin: 10px auto; padding: 10px; width: 200px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>Selamat Datang di LFI Lab</h1>
    <p>Pilih level tantangan di bawah ini.</p>
    <a href="level1.php?page=pages/home.php">Tingkat 1: Dasar</a>
    <a href="level2.php?doc=cGFnZXMvYWJvdXQucGhw">Tingkat 2: Menengah</a>
    <a href="level3.php?module=aG9tZQ==">Tingkat 3: Sulit</a>
    <a href="level4.php">Tingkat 4: LFI via POST</a>
    <a href="level5.php?path=ZG9jcy9kb2t1bWVuLnR4dA==">Tingkat 5: Bypass Filter</a>
    <a href="level6.php">Tingkat 6: Image LFI</a>
    <a href="level7.php">Tingkat 7: Log Poisoning</a>
    <a href="level8.php">Tingkat 8: Mudah Login Dulu</a>
    <a href="level9.php">Tingkat 9: Replace?</a>
    <a href="level10.php">Tingkat 10: Replace?, Filter?</a>
    <a href="level11.php">Tingkat 11: Iframe</a>
    <hr>
    <p><b>Tujuan:</b> Baca isi file <code>secret/supersecret.txt</code> di setiap level.</p>
</body>
</html>