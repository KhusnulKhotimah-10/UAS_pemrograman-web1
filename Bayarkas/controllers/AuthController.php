<?php
require_once 'models/User.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->login($username, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['nama'] = $user['nama_lengkap'];

                header("Location: index.php?url=dashboard");
            } else {
                echo "<script>alert('Login Gagal! Username atau Password salah.'); window.location='index.php?url=login';</script>";
            }
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?url=login");
    }
}