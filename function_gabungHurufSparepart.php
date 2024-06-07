<?php 
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");
$functionSql = "SELECT GeneratePSPID('PL005', 'PG002', '2022-01-04') AS result";
$functionResult = mysqli_query($conn, $functionSql);
$row = mysqli_fetch_assoc($functionResult);
echo "Result: " . $row['result'];
?>
