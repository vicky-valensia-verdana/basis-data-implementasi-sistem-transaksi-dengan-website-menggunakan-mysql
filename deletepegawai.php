<?php
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if(isset($_GET["id_pegawai"])) {
    $id_pegawai = $_GET["id_pegawai"];

    $deleteSql = "CALL Delete_Pegawai('$id_pegawai')";
    
    if(mysqli_query($conn, $deleteSql)) {
        header("location:pegawai.php?deleted=1");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
