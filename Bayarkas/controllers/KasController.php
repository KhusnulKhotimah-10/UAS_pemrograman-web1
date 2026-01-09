<?php

class KasController {
    private $kasModel;

    public function __construct() {
        // Class Kas otomatis terbaca karena sudah di-require di index.php
        $this->kasModel = new Kas();
    }

    public function index() {
    if (!isset($_SESSION['role'])) {
        header("Location: index.php?url=login");
        exit();
    }

    // Ambil keyword jika ada
    $keyword = $_GET['keyword'] ?? null;

    if ($keyword) {
        // JIKA ADA PENCARIAN
        $data_kas = $this->kasModel->cariData($keyword, $_SESSION['role'], $_SESSION['user_id'] ?? null);
    } else {
        // JIKA TIDAK ADA PENCARIAN (NORMAL)
        if ($_SESSION['role'] == 'admin') {
            $data_kas = $this->kasModel->getAll();
        } else {
            $data_kas = $this->kasModel->getByUserId($_SESSION['user_id']);
        }
    }
    
    include 'views/dashboard.php';
}

    public function store() {
    // Pastikan sudah login (siapa pun role-nya)
    if (!isset($_SESSION['role'])) {
        header("Location: index.php?url=login");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Keamanan: Jika mahasiswa, paksa pakai ID sendiri. Jika admin, ambil dari dropdown.
        $user_id    = ($_SESSION['role'] == 'admin') ? $_POST['user_id'] : $_SESSION['user_id'];
        $jumlah     = $_POST['jumlah'];
        $keterangan = $_POST['keterangan'];
        $tanggal    = $_POST['tanggal'];
        $metode     = $_POST['metode']; // Menangkap input metode pembayaran baru

        // Kirim 5 parameter ke model (sesuai perubahan model sebelumnya)
        $simpan = $this->kasModel->simpan($user_id, $jumlah, $keterangan, $tanggal, $metode);

        if ($simpan) {
            header("Location: index.php?url=dashboard&msg=berhasil");
        } else {
            header("Location: index.php?url=dashboard&msg=gagal");
        }
        exit();
    }
}

    public function delete() {
        if ($_SESSION['role'] !== 'admin') {
            die("Akses Ditolak!");
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($this->kasModel->hapus($id)) {
                header("Location: index.php?url=dashboard&msg=hapus-berhasil");
            } else {
                header("Location: index.php?url=dashboard&msg=hapus-gagal");
            }
            exit();
        }
    } // Kurung penutup fungsi delete yang tadi sempat hilang

    public function edit() {
        if ($_SESSION['role'] !== 'admin') {
            die("Akses Ditolak!");
        }
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = $this->kasModel->getById($id);
            
            
            $userModel = new User();
            $users = $userModel->getAllUsers();
            
            include 'views/edit_kas.php';
        }
    }

    public function update() {
    if ($_SESSION['role'] !== 'admin') {
        die("Akses Ditolak!");
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id         = $_POST['id'];
        $user_id    = $_POST['user_id'];
        $jumlah     = $_POST['jumlah'];
        $keterangan = $_POST['keterangan'];
        $tanggal    = $_POST['tanggal'];
        $metode     = $_POST['metode']; // Tambahkan ini

        // Pastikan parameter ke-6 (metode) dikirim ke model
        if ($this->kasModel->update($id, $user_id, $jumlah, $keterangan, $tanggal, $metode)) {
            header("Location: index.php?url=dashboard&msg=update-berhasil");
        } else {
            header("Location: index.php?url=dashboard&msg=update-gagal");
        }
        exit();
    }
}
}