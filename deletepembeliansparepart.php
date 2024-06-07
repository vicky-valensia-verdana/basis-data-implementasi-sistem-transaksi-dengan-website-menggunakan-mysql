<?php
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_GET["id_pembelian_sparepart"])) {
    $id_pembelian_sparepart = $_GET["id_pembelian_sparepart"];
    $deleteSql = "CALL Delete_PembelianSparepart('$id_pembelian_sparepart')";
    
    if(mysqli_query($conn, $deleteSql)) {
        header("location:pembelian_sparepart.php?deleted=1");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
