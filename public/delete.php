<?php
require 'firebase_config.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $ref = "produk/$id";
    $database->getReference($ref)->remove();
}

header('Location: view_data.php');
exit();
?>