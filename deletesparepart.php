<?php
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

if(isset($_GET["id_sparepart"]))
{
    $id_sparepart = mysqli_real_escape_string($conn, $_GET["id_sparepart"]);
    $deleteSql = "CALL Delete_Sparepart('$id_sparepart')";
    
    if(mysqli_query($conn, $deleteSql))
    {
        header("location:sparepart.php?deleted=1");
        exit();
    }
    else
    {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
