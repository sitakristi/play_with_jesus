<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'firebase_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = (int) $_POST['harga']; 
    $stok = (int) $_POST['stok'];
    $kelengkapan = $_POST['kelengkapan'];

    $data = [
        'nama' => $nama,
        'kategori' => $kategori,
        'harga' => $harga,
        'stok' => $stok,
        'kelengkapan' => $kelengkapan
    ];

    // Mengubah rujukan ke node 'produk' sesuai dengan Firebase kamu
    $ref = 'produk';
    $postdata = $database->getReference($ref)->push($data);

    if ($postdata) {
        // Arahkan langsung ke halaman view data jika sukses
        header('Location: view_data.php');
        exit();
    } else {
        echo "Gagal menyimpan data.";
    }
}
?>