<?php 
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");
$selectSql = "SELECT * FROM detail_transaksi";
$selectResult = mysqli_query($conn, $selectSql);
?>
<table border="1">
    <tr>
        <th>Nama Pelanggan</th>
        <th>Nama Pegawai</th>
        <th>Jumlah Sparepart</th>
        <th>Jumlah Service</th>
        <th>Tanggal Pembelian</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($selectResult)) { ?>
    <tr>
        <td><?php echo $row["nama_pelanggan"]; ?></td>
        <td><?php echo $row["nama_pegawai"]; ?></td>
        <td><?php echo $row["Jumlah_Sparepart"]; ?></td>
        <td><?php echo $row["Jumlah_Service"]; ?></td>
        <td><?php echo $row["tgl_pembelian"]; ?></td>
    </tr>
    <?php } ?>
</table>
