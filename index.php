    <?php
    include 'koneksi.php';

    $query = mysqli_query($koneksi, "SELECT * FROM barang");
    ?>

    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Barang</title>
    </head>
    <body>

        <h2>Data Barang</h2>

        <a href="tambah.php">+ Tambah Barang</a>

        <br><br>

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;

            while ($data = mysqli_fetch_assoc($query)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($data['nama_barang']); ?></td>
                    <td><?= htmlspecialchars($data['stok']); ?></td>
                    <td>Rp <?= number_format($data['harga'], 0, ',', '.'); ?></td>
                    <td>kategori: <?= htmlspecialchars($data['kategori']); ?> |
                    <td>
                        <a href="edit.php?id=<?= $data['id']; ?>">Edit</a> |

                        <a href="hapus.php?id=<?= $data['id']; ?>"
                        onclick="return confirm('Yakin ingin menghapus barang ini?')">
                            Hapus
                        </a>
                    </td>
                </tr>
            <?php } ?>

        </table>

    </body>
    </html>