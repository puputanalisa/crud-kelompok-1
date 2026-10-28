<?php
include 'koneksi.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    die("ID barang tidak valid.");
}

$stmt = mysqli_prepare($koneksi, "DELETE FROM barang WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php");
    exit;
}

echo "Gagal menghapus data barang.";
?>