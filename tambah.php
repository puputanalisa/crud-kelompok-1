<?php 
include 'koneksi.php'; 

if(isset($_POST['submit'])){
    $nama_barang = $_POST['nama_barang'];
    $kategori    = $_POST['kategori'];
    $stok        = $_POST['stok'];
    $harga       = $_POST['harga'];

    $insert = mysqli_query($koneksi, "INSERT INTO barang VALUES(NULL, '$kode_barang','$nama_barang', '$kategori', '$stok', '$harga')");
    
    if($insert){
        header("location:index.php");
    } else {
        echo "Gagal menambahkan data.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
</head>
<body>
    <h2>Tambah Barang Baru</h2>
    <form method="POST" action="">
        <label>Kode Barang:</label><br>
        <input type="text" name="kode_barang" required><br><br>
        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" required><br><br>
        
        <label>Kategori:</label><br>
        <select name="kategori" required>
            <option value="ATK">ATK</option>
            <option value="Elektronik">Elektronik</option>
        </select><br><br>

        <label>Stok:</label><br>
        <input type="number" name="stok" required><br><br>

        <label>Harga (Rp):</label><br>
        <input type="number" name="harga" required><br><br>

        <button type="submit" name="submit">Simpan</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>
