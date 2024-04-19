<!DOCTYPE html>
<html>
<head>
    <title>Data Stok Barang</title>
</head>
<body>

    <h1>Data Stok Barang</h1>
    <table border="1">
        <tr>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Jumlah Terjual</th>
            <th>Tanggal Transaksi</th>
            <th>Jenis Barang</th>
        </tr>
        <?php
        if (!empty($stok_barang)) {
            foreach ($stok_barang as $stok) {
                ?>
                <tr>
                    <td><?php echo $stok['nama_barang']; ?></td>
                    <td><?php echo $stok['stok']; ?></td>
                    <td><?php echo $stok['jumlah_terjual']; ?></td>
                    <td><?php echo $stok['tanggal_transaksi']; ?></td>
                    <td><?php echo $stok['jenis_barang']; ?></td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="5">Data tidak tersedia.</td>
            </tr>
            <?php
        }
        ?>
    </table>

</body>
</html>
