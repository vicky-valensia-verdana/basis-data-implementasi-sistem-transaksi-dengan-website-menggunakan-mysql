<?php
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if(isset($_GET["id_transaksi"])) {
    $id_transaksi = $_GET["id_transaksi"];
    $deleteSql = "CALL Delete_Transaksi('$id_transaksi')";
    
    if(mysqli_query($conn, $deleteSql)) {
        header("location:transaksi.php?deleted=1");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
