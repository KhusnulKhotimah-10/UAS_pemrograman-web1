<?php include 'partials/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-header bg-white py-3">
                <h5 class="m-0 font-weight-bold text-primary text-center">Form Tambah Kas</h5>
            </div>
            <div class="card-body p-4">
                <form action="index.php?url=simpan-kas" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Mahasiswa</label>
                        <select name="user_id" class="form-select" required>
                            <option value="" selected disabled>-- Pilih Mahasiswa --</option>
                            <?php 
                            // Pastikan controller sudah mempassing data $users
                            $userModel = new User();
                            $users = $userModel->getAllUsers(); 
                            while($u = $users->fetch_assoc()): 
                            ?>
                                <option value="<?= $u['id']; ?>"><?= $u['nama_lengkap']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Jumlah Bayar (Rp)</label>
                        <input type="number" name="jumlah" class="form-control" placeholder="Contoh: 20000" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tanggal Pembayaran</label>
                        <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d'); ?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="3" placeholder="Contoh: Kas Minggu ke-1 Januari" required></textarea>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan Data
                        </button>
                        <a href="index.php?url=dashboard" class="btn btn-light text-secondary">Batal</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<div class="mb-3">
    <label class="form-label fw-bold">Metode Pembayaran</label>
    <div class="row">
        <div class="col-md-4">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="metode" id="tunai" value="Tunai" checked>
                <label class="form-check-label" for="tunai">
                    <i class="fas fa-money-bill-wave text-success me-1"></i> Tunai
                </label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="metode" id="transfer" value="Transfer Bank">
                <label class="form-check-label" for="transfer">
                    <i class="fas fa-university text-primary me-1"></i> Transfer Bank
                </label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="metode" id="ewallet" value="E-Wallet">
                <label class="form-check-label" for="ewallet">
                    <i class="fas fa-mobile-alt text-info me-1"></i> E-Wallet (OVO/Dana)
                </label>
            </div>
        </div>
    </div>
</div>
<div id="instruksi_pembayaran" class="alert alert-info border-0 shadow-sm mb-4 d-none">
    <h6 class="fw-bold"><i class="fas fa-info-circle me-2"></i> Detail Pembayaran Bendahara:</h6>
    <hr>
    <div id="detail_bank" class="d-none">
        <p class="mb-1"><strong>Bank BCA:</strong> 1234567890</p>
        <p class="mb-1"><strong>A.N:</strong> Bendahara Kelas</p>
    </div>
    <div id="detail_ewallet" class="d-none">
        <p class="mb-1"><strong>DANA / OVO:</strong> 0812-3456-7890</p>
        <p class="mb-0"><strong>A.N:</strong> Bendahara Kelas</p>
    </div>
</div>

<script>
document.querySelectorAll('input[name="metode"]').forEach((elem) => {
    elem.addEventListener("change", function(event) {
        let value = event.target.value;
        let instruksi = document.getElementById("instruksi_pembayaran");
        let bank = document.getElementById("detail_bank");
        let ewallet = document.getElementById("detail_ewallet");

        if (value === "Tunai") {
            instruksi.classList.add("d-none");
        } else {
            instruksi.classList.remove("d-none");
            if (value === "Transfer Bank") {
                bank.classList.remove("d-none");
                ewallet.classList.add("d-none");
            } else {
                ewallet.classList.remove("d-none");
                bank.classList.add("d-none");
            }
        }
    });
});
</script>
<?php include 'partials/footer.php'; ?>