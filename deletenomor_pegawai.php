<?php
// konfigurasi utk koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

// check if "id_jabatan" exists in the URL
if(isset($_GET["id_nomor"]))
{
    // prepare the CALL query for the stored procedure
    $deleteSql = "CALL Delete_NomorPegawai(".$_GET["id_nomor"].")";
    
    // execute the query
    if(mysqli_query($conn, $deleteSql))
    {
        // redirect to pegawai.php after successful deletion
        header("location:nomor_pegawai.php?deleted=1");
    }
    else
    {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
