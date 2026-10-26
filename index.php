<?php
include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM barang ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f4f7;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h2 {
            color: #263b5e;
        }

        .tambah {
            display: inline-block;
            background: #198754;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #263b5e;
            color: white;
        }

        .edit {
            color: #075bb5;
        }

        .hapus {
            color: #d62828;
        }
    </style>
</head>

<body>
<div class="container">
    <h2>Sistem Informasi Pengelolaan Data Barang</h2>
    <p>Daftar seluruh barang yang tersimpan dalam database.</p>

    <a class="tambah" href="tambah.php">+ Tambah Barang</a>

    <table>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; ?>
        <?php while ($row = mysqli_fetch_assoc($data)) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($row['kode_barang']); ?></td>
            <td><?= htmlspecialchars($row['nama_barang']); ?></td>
            <td><?= htmlspecialchars($row['kategori']); ?></td>
            <td><?= $row['stok']; ?></td>
            <td>Rp <?= number_format((float)$row['harga'], 0, ',', '.'); ?></td>
            <td>
                <a class="edit" href="edit.php?id=<?= $row['id']; ?>">
                    Edit
                </a>
                |
                <a class="hapus"
                   href="hapus.php?id=<?= $row['id']; ?>"
                   onclick="return confirm('Yakin ingin menghapus barang ini?')">
                    Hapus
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>