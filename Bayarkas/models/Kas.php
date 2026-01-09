<?php

class Kas extends Database {
    
    public function getAll() {
        $query = "SELECT kas_kelas.*, users.nama_lengkap 
                  FROM kas_kelas 
                  JOIN users ON kas_kelas.user_id = users.id 
                  ORDER BY tanggal DESC";
        return $this->conn->query($query);
    }

    public function getByUserId($user_id) {
        $query = "SELECT kas_kelas.*, users.nama_lengkap 
                  FROM kas_kelas 
                  JOIN users ON kas_kelas.user_id = users.id 
                  WHERE user_id = '$user_id' 
                  ORDER BY tanggal DESC";
        return $this->conn->query($query);
    }

    // HANYA GUNAKAN SATU FUNGSI SIMPAN DI SINI
    public function simpan($user_id, $jumlah, $keterangan, $tanggal, $metode) {
        $user_id    = $this->conn->real_escape_string($user_id);
        $jumlah     = $this->conn->real_escape_string($jumlah);
        $keterangan = $this->conn->real_escape_string($keterangan);
        $tanggal    = $this->conn->real_escape_string($tanggal);
        $metode     = $this->conn->real_escape_string($metode);

        $query = "INSERT INTO kas_kelas (user_id, jumlah_bayar, metode_pembayaran, keterangan, tanggal) 
                  VALUES ('$user_id', '$jumlah', '$metode', '$keterangan', '$tanggal')";
        return $this->conn->query($query);
    }

    public function hapus($id) {
        $id = $this->conn->real_escape_string($id);
        $query = "DELETE FROM kas_kelas WHERE id = '$id'";
        return $this->conn->query($query);
    }

    public function getById($id) {
        $id = $this->conn->real_escape_string($id);
        $query = "SELECT * FROM kas_kelas WHERE id = '$id'";
        return $this->conn->query($query)->fetch_assoc();
    }

    public function update($id, $user_id, $jumlah, $keterangan, $tanggal, $metode) {
        $id         = $this->conn->real_escape_string($id);
        $user_id    = $this->conn->real_escape_string($user_id);
        $jumlah     = $this->conn->real_escape_string($jumlah);
        $keterangan = $this->conn->real_escape_string($keterangan);
        $tanggal    = $this->conn->real_escape_string($tanggal);
        $metode     = $this->conn->real_escape_string($metode);

        $query = "UPDATE kas_kelas SET 
                  user_id = '$user_id', 
                  jumlah_bayar = '$jumlah', 
                  metode_pembayaran = '$metode',
                  keterangan = '$keterangan', 
                  tanggal = '$tanggal' 
                  WHERE id = '$id'";
        return $this->conn->query($query);
    }

    public function cariData($keyword, $role, $user_id = null) {
        $keyword = $this->conn->real_escape_string($keyword);
        
        $query = "SELECT kas_kelas.*, users.nama_lengkap 
                FROM kas_kelas 
                JOIN users ON kas_kelas.user_id = users.id 
                WHERE (users.nama_lengkap LIKE '%$keyword%' 
                OR kas_kelas.keterangan LIKE '%$keyword%')";
        
        if ($role !== 'admin') {
            $query .= " AND kas_kelas.user_id = '$user_id'";
        }
        
        $query .= " ORDER BY tanggal DESC";
        return $this->conn->query($query);
    }
}