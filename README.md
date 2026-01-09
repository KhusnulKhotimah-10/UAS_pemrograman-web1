# UAS_pemrograman-web1
aplikasi web pembayaran uang kas digital bernama (BayarKas)

Aplikasi berbasis web sederhana untuk mengelola kas kelas secara transparan antara Bendahara (Admin) dan Mahasiswa (User). Dibangun menggunakan arsitektur **MVC (Model-View-Controller)** dengan PHP native dan Bootstrap 5.

##  Fitur Utama
- **Multi-Role System**: Perbedaan akses antara Admin (Bendahara) dan Mahasiswa.
- **Manajemen Kas (Admin)**: Tambah, Edit, Hapus, dan Pencarian data kas mahasiswa.
- **Pembayaran Mandiri (Mahasiswa)**: Mahasiswa dapat menginput pembayaran mereka sendiri dengan memilih metode pembayaran.
- **Metode Pembayaran**: Mendukung Tunai, Transfer Bank, dan E-Wallet (OVO/Dana).
- **Instruksi Otomatis**: Menampilkan detail rekening/nomor e-wallet saat metode transfer dipilih.
- **Total Akumulasi**: Menghitung total kas yang terkumpul secara otomatis di Dashboard.
- **Keamanan**: Proteksi ID mahasiswa sehingga mahasiswa tidak bisa menginput data atas nama orang lain.

##  Teknologi yang Digunakan
- **Bahasa**: PHP Native
- **Database**: MySQL
- **CSS Framework**: Bootstrap 5
- **Icons**: Font Awesome 5
- **Arsitektur**: MVC (Model-View-Controller)

##  Struktur folder

BayarKas/
├── controllers/
│   └── KasController.php   # Logika bisnis transaksi kas
├── models/
│   ├── Database.php        # Koneksi ke database MySQL
│   ├── Kas.php             # Query database terkait kas
│   └── User.php            # Query database terkait data user
├── views/
│   ├── dashboard.php       # Tampilan utama (Tabel riwayat)
│   ├── tambah_kas.php      # Form pembayaran mahasiswa
│   └── edit_kas.php        # Form edit data (Admin)
├── partials/
│   ├── header.php          # Header & Navbar
│   └── footer.php          # Footer & Script
└── index.php               # Router utama aplikasi

##  Screenshots & Cara Kerja

### 1. Sistem Autentikasi & Login
<img width="1366" height="768" alt="Screenshot at 2026-01-09 11-44-48" src="https://github.com/user-attachments/assets/942c97e8-4638-4011-92eb-c57774160fc9" />

*Proteksi Halaman: Jika pengguna mencoba mengakses URL dashboard secara langsung tanpa login, sistem akan otomatis menolaknya dan mengarahkan kembali ke halaman login.*

### 2. Dashboard Admin (Bendahara)
<img width="1366" height="768" alt="Screenshot at 2026-01-09 11-49-10" src="https://github.com/user-attachments/assets/af429e15-f71a-4a9a-a24c-1d5601f08ed1" />

*Admin memiliki kontrol penuh untuk mengelola data, melihat total kas, dan melakukan aksi Edit/Hapus pada setiap transaksi.*

### 3. Dashboard Mahasiswa
<img width="1366" height="768" alt="Screenshot at 2026-01-09 11-48-55" src="https://github.com/user-attachments/assets/06f6d7c3-1ac1-4488-b74c-e57e06fbb30d" />
<img width="1366" height="768" alt="Screenshot at 2026-01-09 11-48-03" src="https://github.com/user-attachments/assets/6c9299bf-f82a-4d13-aa93-ba7841c81a7e" />

*Mahasiswa hanya dapat melihat riwayat pembayaran mereka sendiri dan memiliki tombol hijau **"Bayar Kas Sekarang"** untuk membayar mandiri.*

### 4. Form Pembayaran & Instruksi
![Form Pembayaran](https://images2.imgbox.com/71/3b/68uO29Kz_o.png)
*Saat memilih metode "Transfer Bank", instruksi pembayaran (Nomor Rekening) akan muncul secara otomatis menggunakan JavaScript sebelum data disimpan.*

### 5. Fitur Pencarian & Filter
![Fitur Cari](https://images2.imgbox.com/f9/55/K30I6iCH_o.png)
*Memudahkan pencarian riwayat kas berdasarkan nama mahasiswa atau keterangan transaksi.*

##  Cara Instalasi (Localhost)
1. Clone atau download repository ini.
2. Pindahkan folder ke direktori `htdocs` (XAMPP).
3. Import file `database.sql` ke phpMyAdmin.
4. Sesuaikan konfigurasi database pada file `models/Database.php`.
5. Buka browser dan akses `localhost/nama-folder-anda`.

## Akun Demo
Akun Admin: username: admin | password: 123
Akun Mahasiswa: username: mahasiswa | password: 123

---
*Tugas ini disusun untuk memenuhi tugas pemrograman web 1 - © 2026*
