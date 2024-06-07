<?php 
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");
$selectSql = "SELECT * FROM pemasukan_pegawai_service";
$selectResult = mysqli_query($conn, $selectSql);
?>
<table border="1">
    <tr>
        <th>ID Pegawai</th>
        <th>Nama Pegawai</th>
        <th>Nama Jabatan</th>
        <th>Total Pemasukan</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($selectResult)) { ?>
    <tr>
        <td><?php echo $row["id_pegawai"]; ?></td>
        <td><?php echo $row["nama_pegawai"]; ?></td>
        <td><?php echo $row["nama_jabatan"]; ?></td>
        <td><?php echo $row["Total_Pemasukan"]; ?></td>
    </tr>
    <?php } ?>
</table>
