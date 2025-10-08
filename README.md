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

---

### Level 2: LFI dengan Input Base64

---

### Level 3: Bypass dengan Null Byte

---

### Level 4: LFI via Metode POST

---

### Level 5: Bypass Filter Path Traversal

---

### Level 6: LFI via Image Path

---

### Level 7: LFI to RCE via Log Poisoning

---

### Level 8: Authenticated LFI (LFI setelah Login)

---

### Level 9: Login Replace

---

### Level 10: Replace? Filter?

---

### Level 11: IFrame

---

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