<?php
// konfigurasi utk koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

if(isset($_GET["id_pelanggan"])) {
    // Ambil id_pelanggan dari parameter GET
    $id_pelanggan = $_GET["id_pelanggan"];

    // Siapkan query CALL untuk stored procedure Delete_Pelanggan
    $deleteSql = "CALL Delete_Pelanggan('$id_pelanggan')";

    // Jalankan query
    if(mysqli_query($conn, $deleteSql)) {
        // Redirect ke pelanggan.php setelah penghapusan berhasil
        header("location:pelanggan.php?deleted=1");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
