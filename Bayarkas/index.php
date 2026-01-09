<?php
// Tetap aktifkan ini agar jika ada error di View/Controller langsung terlihat
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Load semua file inti
require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/models/User.php';
require_once __DIR__ . '/models/Kas.php';
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/KasController.php';

// Inisialisasi Controller
$auth = new AuthController();
$kas = new KasController();

// Routing Sederhana
$url = isset($_GET['url']) ? $_GET['url'] : 'login';

switch ($url) {
    case 'login':
        include __DIR__ . '/views/login.php';
        break;
        
    case 'login-proses':
        $auth->login();
        break;

    case 'logout':
        $auth->logout();
        break;

    case 'dashboard':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?url=login");
            exit();
        }
        $kas->index();
        break;

    // FITUR KAS (CRUD)
    case 'tambah-kas':
        include __DIR__ . '/views/tambah_kas.php';
        break;

    case 'simpan-kas':
        $kas->store(); 
        break;

    case 'edit-kas': 
        $kas->edit(); 
        break;

    case 'update-kas': 
        $kas->update(); 
        break;

    case 'hapus-kas':
        $kas->delete();
        break;

    default:
        echo "<h3>404 - Halaman Tidak Ditemukan!</h3>";
        echo "<a href='index.php?url=login'>Kembali ke Login</a>";
        break;
}