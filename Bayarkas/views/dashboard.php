<?php include 'partials/header.php'; ?>

<?php if (isset($_GET['msg'])): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        <?php 
            if($_GET['msg'] == 'berhasil') echo "Data kas berhasil disimpan!";
            if($_GET['msg'] == 'hapus-berhasil') echo "Data kas telah dihapus!";
            if($_GET['msg'] == 'update-berhasil') echo "Data kas berhasil diperbarui!";
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Halo, <?php echo $_SESSION['nama_lengkap'] ?? $_SESSION['nama'] ?? 'User'; ?></h4>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="index.php?url=logout" class="btn btn-sm btn-outline-danger">
            <i class="fas fa-sign-out-alt"></i> Keluar
        </a>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="card bg-success text-white shadow-sm border-0">
            <div class="card-body">
                <h6>Total Kas Terkumpul</h6>
                <h3>
                    <?php 
                    $total = 0;
                    foreach($data_kas as $t) {
                        $total += $t['jumlah_bayar'];
                    }
                    $data_kas->data_seek(0); 
                    echo "Rp. " . number_format($total, 0, ',', '.');
                    ?>
                </h3> 
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="m-0 font-weight-bold text-primary">Riwayat Pembayaran Kas</h5>
        
        <?php if($_SESSION['role'] == 'admin'): ?>
            <a href="index.php?url=tambah-kas" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        <?php else: ?>
            <a href="index.php?url=tambah-kas" class="btn btn-success btn-sm">
                <i class="fas fa-wallet"></i> Bayar Kas Sekarang
            </a>
        <?php endif; ?>
    </div>

    <div class="card-body">
        <form action="index.php" method="GET" class="row g-3 mb-4">
            <input type="hidden" name="url" value="dashboard">
            <div class="col-auto">
                <input type="text" name="keyword" class="form-control form-control-sm" 
                       placeholder="Cari nama atau ket..." 
                       value="<?php echo $_GET['keyword'] ?? ''; ?>">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-sm btn-secondary">Cari</button>
                <?php if(isset($_GET['keyword'])): ?>
                    <a href="index.php?url=dashboard" class="btn btn-sm btn-outline-dark">Reset</a>
                <?php endif; ?>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Mahasiswa</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <?php if($_SESSION['role'] == 'admin'): ?>
                            <th></th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    while($row = $data_kas->fetch_assoc()): 
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($row['tanggal'])); ?></td>
                        <td><?php echo $row['nama_lengkap']; ?></td>
                        <td>Rp. <?php echo number_format($row['jumlah_bayar'], 0, ',', '.'); ?></td>
                        <td><?php echo $row['keterangan']; ?></td>
                        
                        <?php if($_SESSION['role'] == 'admin'): ?>
                        <td>
                            <a href="index.php?url=edit-kas&id=<?= $row['id']; ?>" class="btn btn-sm btn-link p-0 me-3 text-decoration-none">
                                <i class="fas fa-edit text-secondary" style="font-size: 1.1rem;"></i>
                            </a>
                            <a href="index.php?url=hapus-kas&id=<?php echo $row['id']; ?>" 
                               class="btn btn-sm btn-link p-0 text-decoration-none" 
                               onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash text-secondary" style="font-size: 1.1rem;"></i>
                            </a>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php if (isset($_GET['msg']) && $_GET['msg'] == 'berhasil'): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="fas fa-check-circle me-2"></i> Data kas berhasil disimpan! 
        <a href="https://wa.me/6281234567890?text=Halo%20Bendahara,%20saya%20sudah%20bayar%20kas%20sebesar%20Rp.<?php echo $_GET['jumlah'] ?? ''; ?>" 
           target="_blank" class="btn btn-sm btn-success ms-3">
            <i class="fab fa-whatsapp"></i> Kirim Bukti ke Bendahara
        </a>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php include 'partials/footer.php'; ?>