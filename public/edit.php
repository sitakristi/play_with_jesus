<?php
require 'firebase_config.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: view_data.php');
    exit();
}

$ref = "produk/$id";
$product = $database->getReference($ref)->getValue();

if (!$product) {
    echo "Data produk tidak ditemukan!";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = (int) $_POST['harga'];
    $stok = (int) $_POST['stok'];
    $kelengkapan = $_POST['kelengkapan'];

    $updateData = [
        'nama' => $nama,
        'kategori' => $kategori,
        'harga' => $harga,
        'stok' => $stok,
        'kelengkapan' => $kelengkapan
    ];

    $database->getReference($ref)->update($updateData);
    header('Location: view_data.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PlayWithJesus - Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header card-header-edit text-center">
                        <h4 class="mb-0">Edit Data Produk PlayWithJesus</h4>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST">
                            <div class="mb-3">
                                <label class="fw-bold text-secondary">Nama Produk</label>
                                <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($product['nama'] ?? ''); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold text-secondary">Kategori</label>
                                <select name="kategori" class="form-select" required>
                                    <?php $cat = $product['kategori'] ?? ''; ?>
                                    <option value="Puzzle" <?= ($cat == 'Puzzle') ? 'selected' : ''; ?>>Puzzle</option>
                                    <option value="Flash Card" <?= ($cat == 'Flash Card') ? 'selected' : ''; ?>>Flash Card</option>
                                    <option value="Tebak Gambar" <?= ($cat == 'Tebak Gambar') ? 'selected' : ''; ?>>Tebak Gambar</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold text-secondary">Harga (Rp)</label>
                                <input type="number" name="harga" class="form-control" value="<?= htmlspecialchars($product['harga'] ?? ''); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold text-secondary">Stok</label>
                                <input type="number" name="stok" class="form-control" value="<?= htmlspecialchars($product['stok'] ?? ''); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold text-secondary">Kelengkapan</label>
                                <textarea name="kelengkapan" class="form-control" rows="3" required><?= htmlspecialchars($product['kelengkapan'] ?? ''); ?></textarea>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <a href="view_data.php" class="btn btn-outline-secondary px-4 rounded-pill">Kembali</a>
                                <button type="submit" class="btn btn-warning-pastel px-4 rounded-pill shadow">Perbarui Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>