<?php include 'partials/header.php'; ?>

<div class="row justify-content-center mt-5">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h3 class="text-center mb-4">Login Bayarkas</h3>
                
                <form action="index.php?url=login-proses" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Masuk</button>
                </form>
                
                <div class="mt-3 text-center text-muted">
                    <small>Gunakan akun admin/mahasiswa untuk tes.</small>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>