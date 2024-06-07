<?php
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

if(isset($_GET["id_header"])) {
    $deleteSql = "CALL Delete_HeaderTransaksi('" . $_GET["id_header"] . "')";

    if(mysqli_query($conn, $deleteSql)) {
        header("location: header_transaksi.php?deleted=1");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
