
<?php
include 'koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM barang WHERE id='$id'");
$barang = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $kode = $_POST['kode_barang'];
    $nama = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    // Update data ke database
    $query = mysqli_query($conn, "UPDATE barang SET
        kode_barang='$kode',
        nama_barang='$nama',
        kategori='$kategori',
        stok='$stok',
        harga='$harga'
        WHERE id='$id'");

    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal diupdate!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
</head>
<body>

    <h2>Edit Data Barang</h2>

    <form method="POST">
        Kode Barang:<br>
        <input type="text" name="kode_barang"
        value="<?= htmlspecialchars($barang['kode_barang']); ?>" required>
        <br><br>

        Nama Barang:<br>
        <input type="text" name="nama_barang"
        value="<?= htmlspecialchars($barang['nama_barang']); ?>" required>
        <br><br>

        Kategori:<br>
        <input type="text" name="kategori"
        value="<?= htmlspecialchars($barang['kategori']); ?>" required>
        <br><br>

        Stok:<br>
        <input type="number" name="stok"
        value="<?= $barang['stok']; ?>" min="0" required>
        <br><br>

        Harga:<br>
        <input type="number" name="harga"
        value="<?= $barang['harga']; ?>" min="0" required>
        <br><br>

        <button type="submit" name="update">Update</button>
        <a href="index.php">Kembali</a>
    </form>

</body>
</html>