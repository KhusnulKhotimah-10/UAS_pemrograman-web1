<?php include 'partials/header.php'; ?>
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
            <h5 class="m-0">Edit Pembayaran Kas</h5>
        </div>
        <div class="card-body">
            <form action="index.php?url=update-kas" method="POST">
                <input type="hidden" name="id" value="<?= $data['id']; ?>">
                
                <div class="mb-3">
                    <label>Mahasiswa</label>
                    <select name="user_id" class="form-control" required>
                        <?php while($u = $users->fetch_assoc()): ?>
                            <option value="<?= $u['id']; ?>" <?= ($u['id'] == $data['user_id']) ? 'selected' : ''; ?>>
                                <?= $u['nama_lengkap']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Jumlah Bayar</label>
                    <input type="number" name="jumlah" class="form-control" value="<?= $data['jumlah_bayar']; ?>" required>
                </div>
                <div class="mb-3">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" value="<?= $data['keterangan']; ?>" required>
                </div>
                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="index.php?url=dashboard" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>