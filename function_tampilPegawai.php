<?php 
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");
$functionSql = "SELECT Show_Transaksi_Pegawai('PG006','2022-01-08') AS result";
$functionResult = mysqli_query($conn, $functionSql);
$row = mysqli_fetch_assoc($functionResult);
echo "Result: " . $row['result'];
?>
