# UAS_pemrograman-web1
aplikasi web pembayaran uang kas digital bernama Bayarkas

# 💰 Aplikasi Bayar Kas Kelas (BayarKas)

Aplikasi berbasis web sederhana untuk mengelola kas kelas secara transparan antara Bendahara (Admin) dan Mahasiswa (User). Dibangun menggunakan arsitektur **MVC (Model-View-Controller)** dengan PHP native dan Bootstrap 5.

## ✨ Fitur Utama
- **Multi-Role System**: Perbedaan akses antara Admin (Bendahara) dan Mahasiswa.
- **Manajemen Kas (Admin)**: Tambah, Edit, Hapus, dan Pencarian data kas mahasiswa.
- **Pembayaran Mandiri (Mahasiswa)**: Mahasiswa dapat menginput pembayaran mereka sendiri dengan memilih metode pembayaran.
- **Metode Pembayaran**: Mendukung Tunai, Transfer Bank, dan E-Wallet (OVO/Dana).
- **Instruksi Otomatis**: Menampilkan detail rekening/nomor e-wallet saat metode transfer dipilih.
- **Total Akumulasi**: Menghitung total kas yang terkumpul secara otomatis di Dashboard.
- **Keamanan**: Proteksi ID mahasiswa sehingga mahasiswa tidak bisa menginput data atas nama orang lain.

## 🛠️ Teknologi yang Digunakan
- **Bahasa**: PHP Native
- **Database**: MySQL
- **CSS Framework**: Bootstrap 5
- **Icons**: Font Awesome 5
- **Arsitektur**: MVC (Model-View-Controller)

## 📸 Screenshots & Cara Kerja

### 1. Dashboard Admin (Bendahara)
![Dashboard Admin](https://images2.imgbox.com/62/6d/Ea99H0rK_o.png)
*Admin memiliki kontrol penuh untuk mengelola data, melihat total kas, dan melakukan aksi Edit/Hapus pada setiap transaksi.*

### 2. Dashboard Mahasiswa
![Dashboard Mahasiswa](https://images2.imgbox.com/13/46/YpY1I72Y_o.png)
*Mahasiswa hanya dapat melihat riwayat pembayaran mereka sendiri dan memiliki tombol hijau **"Bayar Kas Sekarang"** untuk membayar mandiri.*

### 3. Form Pembayaran & Instruksi
![Form Pembayaran](https://images2.imgbox.com/71/3b/68uO29Kz_o.png)
*Saat memilih metode "Transfer Bank", instruksi pembayaran (Nomor Rekening) akan muncul secara otomatis menggunakan JavaScript sebelum data disimpan.*

### 4. Fitur Pencarian & Filter
![Fitur Cari](https://images2.imgbox.com/f9/55/K30I6iCH_o.png)
*Memudahkan pencarian riwayat kas berdasarkan nama mahasiswa atau keterangan transaksi.*

## 🚀 Cara Instalasi (Localhost)
1. Clone atau download repository ini.
2. Pindahkan folder ke direktori `htdocs` (XAMPP).
3. Import file `database.sql` ke phpMyAdmin.
4. Sesuaikan konfigurasi database pada file `models/Database.php`.
5. Buka browser dan akses `localhost/nama-folder-anda`.

---
*Tugas ini disusun untuk memenuhi tugas pemrograman web - © 2026*
