<?php 
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");
$functionSql = "SELECT Show_Sparepart_Service ('T003') AS result";
$functionResult = mysqli_query($conn, $functionSql);
$row = mysqli_fetch_assoc($functionResult);
echo "Result: " . $row['result'];
?>
