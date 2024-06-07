<?php
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

if(isset($_GET["id_jabatan"])) {
    $id_jabatan = $_GET["id_jabatan"];
    $deleteSql = "CALL Delete_Jabatan('$id_jabatan')";
    if(mysqli_query($conn, $deleteSql)) {
        header("location:index.php?deleted=1");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>

