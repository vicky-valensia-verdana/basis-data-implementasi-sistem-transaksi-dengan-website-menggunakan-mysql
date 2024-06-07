<?php 
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");
$selectSql = "SELECT * FROM ban_dunlop";
$selectResult = mysqli_query($conn, $selectSql);
?>
<table border="1">
    <tr>
        <th>ID Sparepart</th>
        <th>ID Pelanggan</th>
        <th>Tanggal Pembalian</th>
        <th>Nama Sparepart</th>
        <th>Stok</th>
        <th>Jenis Sparepart</th>
        <th>Harga</th>
        <th>ID Transaksi</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($selectResult)) { ?>
    <tr>
        <td><?php echo $row["id_sparepart"]; ?></td>
        <td><?php echo $row["id_pelanggan"]; ?></td>
        <td><?php echo $row["tgl_pembelian"]; ?></td>
        <td><?php echo $row["nama_sparepart"]; ?></td>
        <td><?php echo $row["stok"]; ?></td>
        <td><?php echo $row["jenis_sparepart"]; ?></td>
        <td><?php echo $row["harga"]; ?></td>
        <td><?php echo $row["id_transaksi"]; ?></td>
    </tr>
    <?php } ?>
</table>
