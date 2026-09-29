<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'firebase_config.php';

$ref = 'produk';
$getdata = $database->getReference($ref)->getValue();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PlayWithJesus - Daftar Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container py-5">
        <div class="card shadow-lg">
            <div class="card-header card-header-view text-white d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="mb-0">Daftar Koleksi PlayWithJesus</h3>
                    <p class="mb-0 text-light small">Kelola produk permainan rohani anak dengan mudah</p>
                </div>
                <a href="index.php" class="btn btn-light text-success fw-bold px-4 rounded-pill shadow-sm">+ Tambah Data Baru</a>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Kelengkapan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if ($getdata > 0) {
                                foreach ($getdata as $id => $row) {
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td class="fw-semibold text-dark"><?= htmlspecialchars($row['nama'] ?? ''); ?></td>
                                        <td>
                                            <span class="badge bg-info text-dark px-2 py-1"><?= htmlspecialchars($row['kategori'] ?? ''); ?></span>
                                        </td>
                                        <td>Rp <?= number_format($row['harga'] ?? 0, 0, ',', '.'); ?></td>
                                        <td>
                                            <span class="badge bg-secondary"><?= htmlspecialchars($row['stok'] ?? ''); ?> pcs</span>
                                        </td>
                                        <td><?= htmlspecialchars($row['kelengkapan'] ?? ''); ?></td>
                                        <td>
                                            <a href="edit.php?id=<?= $id; ?>" class="btn btn-warning btn-sm px-3 rounded-pill text-white fw-bold">Edit</a>
                                            <a href="delete.php?id=<?= $id; ?>" class="btn btn-danger btn-sm px-3 rounded-pill fw-bold" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">Belum ada data produk tersimpan. Yuk tambah produk baru!</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>