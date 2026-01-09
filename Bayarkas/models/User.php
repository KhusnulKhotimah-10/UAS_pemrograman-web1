<?php

class User extends Database {
    
    public function login($username, $password) {
        // 1. Ambil koneksi dari parent Database
        $conn = $this->conn;

        // 2. Bersihkan input untuk mencegah SQL Injection
        $username = $conn->real_escape_string($username);
        $password = $conn->real_escape_string($password);
        
        // 3. Cari user berdasarkan username
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($query);
        
        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            // 4. PERBAIKAN: Bandingkan password teks biasa secara langsung
            // Karena di database kamu passwordnya belum di-hash (misal: 'password123')
            if ($password === $user['password']) {
                return $user;
            }
        }
        
        // Jika tidak cocok atau user tidak ditemukan
        return false;
    }

    public function getAllUsers() {
        $query = "SELECT * FROM users";
        return $this->conn->query($query);
    }
}