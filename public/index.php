<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PlayWithJesus - Tambah Produk Edukasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container py-5">
        
        <!-- Tombol Logout diletakkan di sudut kanan atas -->
        <div class="d-flex justify-content-end">
            <a href="logout.php" class="btn btn-danger mb-3">Logout</a>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header card-header-add text-white text-center">
                        <h3 class="mb-0">PlayWithJesus</h3>
                        <p class="mb-0 text-light small">Play, Learn, and Grow in Faith.</p>
                    </div>
                    <div class="card-body p-4">
                        <form action="insert.php" method="POST">
                            <div class="mb-3">
                                <label class="fw-bold text-secondary">Nama Produk</label>
                                <input type="text" name="nama" class="form-control" placeholder="Contoh: Puzzle Tokoh Alkitab" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="fw-bold text-secondary">Kategori</label>
                                <select name="kategori" class="form-select" required>
                                    <option value="" disabled selected>Pilih Kategori Permainan</option>
                                    <option value="Puzzle">Puzzle</option>
                                    <option value="Flash Card">Flash Card</option>
                                    <option value="Tebak Gambar">Tebak Gambar</option>
                                    <option value="Aksesori">Aksesori</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="fw-bold text-secondary">Harga (Rp)</label>
                                <input type="number" name="harga" class="form-control" placeholder="Contoh: 50000" required>
                            </div>

                            <div class="mb-3">
                                <label class="fw-bold text-secondary">Stok</label>
                                <input type="number" name="stok" class="form-control" placeholder="Contoh: 20" required>
                            </div>

                            <div class="mb-3">
                                <label class="fw-bold text-secondary">Kelengkapan</label>
                                <textarea name="kelengkapan" class="form-control" rows="3" placeholder="Contoh: 30 keping puzzle, buku panduan cerita" required></textarea>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <a href="view_data.php" class="btn btn-outline-secondary px-4 rounded-pill">Lihat Daftar Produk</a>
                                <button type="submit" class="btn btn-success px-4 rounded-pill shadow">Simpan Produk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>