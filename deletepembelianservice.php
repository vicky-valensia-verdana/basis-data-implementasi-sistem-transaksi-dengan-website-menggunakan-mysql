<?php
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

if(isset($_GET["id_pembelian_service"]))
{
    $id_pembelian_service = $_GET["id_pembelian_service"];
    $deleteSql = "CALL Delete_PembelianService('$id_pembelian_service')";
    
    if(mysqli_query($conn, $deleteSql))
    {
        header("location:pembelian_service.php?deleted=1");
        exit();
    }
    else
    {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
