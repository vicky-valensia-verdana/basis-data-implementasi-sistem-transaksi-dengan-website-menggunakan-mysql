<?php
// Konfigurasi untuk koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

// Periksa apakah "id_service" ada dalam URL
if(isset($_GET["id_service"])) {
    // Lakukan sanitasi input untuk mencegah serangan SQL Injection
    $id_service = mysqli_real_escape_string($conn, $_GET["id_service"]);
    
    // Persiapkan query untuk memanggil stored procedure Delete_Service
    $deleteSql = "CALL Delete_Service('$id_service')";
    
    // Eksekusi query
    if(mysqli_query($conn, $deleteSql)) {
        // Redirect ke service.php setelah penghapusan berhasil
        header("location: service.php?deleted=1");
        exit(); // Hentikan eksekusi skrip setelah mengarahkan ulang
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
