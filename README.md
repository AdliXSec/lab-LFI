# 🧪 LFI (Local File Inclusion) Lab untuk Pengembangan Scanner

Selamat datang di LFI Lab! Lingkungan ini dirancang khusus sebagai tempat pengujian (testbed) untuk mengembangkan dan menyempurnakan alat pemindai kerentanan LFI (LFI vulnerability scanner). Lab ini terdiri dari 8 level dengan studi kasus yang berbeda-beda, mencakup berbagai teknik LFI yang umum ditemukan di dunia nyata.

## 🎯 Tujuan Utama

Tujuan Anda di setiap level adalah untuk berhasil membaca konten dari file rahasia yang terletak di:
`secret/supersecret.txt`

## 🚀 Instalasi & Setup

Untuk menjalankan lab ini, Anda memerlukan server web lokal dengan dukungan PHP.

1.  **Web Server**: Pastikan Anda memiliki XAMPP, WAMP, MAMP, atau server lokal lainnya yang sudah terpasang.
2.  **Clone/Download**: Unduh atau kloning repositori ini ke direktori root server web Anda (misalnya, `htdocs` di XAMPP).
3.  **Jalankan Server**: Nyalakan layanan Apache dan MySQL (jika diperlukan) dari panel kontrol server Anda.
4.  **Akses Lab**: Buka browser dan navigasikan ke `http://localhost/[nama-folder-lab]/`.

## 📚 Detail Level Tantangan

Setiap level menyajikan skenario LFI yang unik, memaksa scanner Anda untuk beradaptasi dan mencoba berbagai metode eksploitasi.

---

### Level 1: LFI Dasar (Basic LFI)

* **Deskripsi**: Ini adalah bentuk LFI yang paling umum dan sederhana. Aplikasi mengambil nama file dari parameter URL tanpa validasi apa pun.
* **Studi Kasus**: Eksploitasi menggunakan teknik *Path Traversal* sederhana.
* **Parameter Rentan**: `page` (Metode GET)
* **Contoh Payload**: `../../../../../../../../secret/supersecret.txt`

---

### Level 2: LFI dengan Input Base64

* **Deskripsi**: Aplikasi mengharapkan input yang di-encode menggunakan Base64 untuk menyembunyikan path file.
* **Studi Kasus**: Payload *Path Traversal* harus di-encode ke Base64 sebelum dikirim.
* **Parameter Rentan**: `doc` (Metode GET)
* **Contoh Payload**: `../../../../secret/supersecret.txt` di-encode menjadi `Li4vLi4vLi4vLi4vc2VjcmV0L3N1cGVyc2VjcmV0LnR4dA==`

---

### Level 3: Bypass dengan Null Byte

* **Deskripsi**: Aplikasi menambahkan ekstensi file (misalnya `.php`) ke input pengguna di sisi server. Hal ini dilakukan untuk membatasi inklusi hanya pada tipe file tertentu.
* **Studi Kasus**: Teknik *Null Byte Injection* (`%00`) digunakan untuk memotong string ekstensi tambahan dari server.
* **Parameter Rentan**: `module` (Metode GET, input di-encode Base64)
* **Contoh Payload**: `../../../../secret/supersecret.txt%00` di-encode ke Base64.
* **Catatan**: Teknik ini mungkin tidak berfungsi pada versi PHP yang lebih baru (> 5.3.4).

---

### Level 4: LFI via Metode POST

* **Deskripsi**: Kerentanan LFI tidak selalu berada di parameter GET yang terlihat di URL. Level ini menyembunyikan parameter rentan di dalam request body (POST).
* **Studi Kasus**: Scanner harus mampu mendeteksi dan menguji parameter yang dikirim melalui metode POST.
* **Petunjuk**: Periksa source code halaman `level4.php` untuk menemukan nama parameter yang digunakan di dalam form.

---

### Level 5: Bypass Filter Path Traversal

* **Deskripsi**: Aplikasi memiliki mekanisme keamanan sederhana yang mencoba menghapus atau memblokir sekuens `../` dari input.
* **Studi Kasus**: Diperlukan teknik bypass filter, seperti menggunakan `....//` atau variasi encoding URL untuk mengelabui filter.
* **Parameter Rentan**: `path` (Metode GET, input di-encode Base64)
* **Contoh Payload**: `....//....//....//....//secret/supersecret.txt`

---

### Level 6: LFI via Image Path

* **Deskripsi**: Kerentanan terjadi pada fungsionalitas yang seharusnya hanya memuat file gambar. Mungkin ada validasi ekstensi file yang lemah.
* **Studi Kasus**: Mengeksploitasi fitur yang memvalidasi ekstensi file, sering kali dikombinasikan dengan teknik lain seperti *Null Byte*.
* **Petunjuk**: Temukan cara agar aplikasi menyertakan file teks rahasia meskipun ia mengharapkan path menuju sebuah gambar.

---

### Level 7: LFI to RCE via Log Poisoning

* **Deskripsi**: Level ini menunjukkan bagaimana LFI dapat ditingkatkan menjadi *Remote Code Execution* (RCE). Penyerang dapat menyisipkan kode PHP ke dalam file log server.
* **Studi Kasus**:
    1.  Sisipkan kode PHP (misalnya, `<?php system($_GET['cmd']); ?>`) ke dalam log server (misalnya, melalui User-Agent header).
    2.  Gunakan kerentanan LFI untuk menyertakan file log tersebut.
    3.  Eksekusi perintah pada server.
* **Petunjuk**: Anda perlu menemukan path ke file log Apache (`/var/log/apache2/access.log`, `C:/xampp/apache/logs/access.log`, dll.) dan menyertakannya.

---

### Level 8: Authenticated LFI (LFI setelah Login)

* **Deskripsi**: Kerentanan LFI tidak selalu dapat diakses secara publik. Terkadang, kerentanan ini hanya ada di halaman yang memerlukan otentikasi.
* **Studi Kasus**: Scanner harus dapat mengelola sesi atau token otentikasi untuk memindai halaman-halaman internal.
* **Petunjuk**: Level ini memiliki halaman login yang sangat sederhana. Cari tahu kredensialnya (mungkin sangat umum), login, lalu temukan kerentanan LFI di dalam area admin.

## 🛠️ Penggunaan untuk Pengembangan Scanner

Lab ini sangat ideal untuk menguji fitur-fitur berikut pada LFI scanner Anda:
* Deteksi parameter GET dan POST.
* Kemampuan untuk meng-encode payload (misalnya, Base64).
* Daftar payload yang beragam untuk bypass filter.
* Dukungan untuk teknik Null Byte.
* Pengujian LFI pada skenario yang memerlukan otentikasi (manajemen sesi/cookie).
* Validasi positif dengan mencari string tertentu setelah eksploitasi berhasil.

## ⚠️ Peringatan

Lingkungan ini dirancang **khusus untuk tujuan pendidikan dan penelitian keamanan**. Jangan pernah mencoba teknik-teknik ini pada sistem yang bukan milik Anda atau tanpa izin eksplisit. Penulis tidak bertanggung jawab atas penyalahgunaan apa pun dari materi ini.