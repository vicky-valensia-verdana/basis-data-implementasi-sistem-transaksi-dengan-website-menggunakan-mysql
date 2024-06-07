<?php 
// konfigurasi untuk koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

// untuk proses update 
if(isset($_POST["btn_update"]))
{
    // Periksa apakah nilai id_nomor dan no_tlp terkirim
    echo "id_nomor: " . $_POST["id_nomor"] . "<br>";
    echo "no_tlp: " . $_POST["no_tlp"] . "<br>";

    // Panggil prosedur update dengan nilai yang sesuai
    $updateSql = "CALL Update_Nomor_Pegawai('".$_POST["id_nomor"]."','".$_POST["no_tlp"]."')";

    
    // Eksekusi query update
    if(mysqli_query($conn, $updateSql))
    {
        header("location:nomor_pegawai.php?updated=1");
    }
    else
    {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Ambil id_nomor dari URL
$id_nomor = $_GET['id_nomor'];

// Ambil data yang ada untuk id_nomor yang diberikan
$selectSql = "SELECT * FROM nomor_pegawai WHERE id_nomor = $id_nomor";
$selectResult = mysqli_query($conn, $selectSql);
$row = mysqli_fetch_assoc($selectResult);
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Nomor Pegawai</title>
</head>
<body>
    <div class="container box my-5">
        <form action="" name="edit_nomor_pegawai" method="post">
            <h3 class="text-center">Edit Nomor Pegawai</h3>
            <div class="form-group">
                <input type="text" name="id_pegawai" value="<?php echo $row['id_pegawai']; ?>" readonly>
                <input type="text" name="id_nomor" value="<?php echo $row['id_nomor']; ?>" readonly>
                <input type="text" name="no_tlp" value="<?php echo $row['no_tlp']; ?>" required>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="form-control bg-info text-white font-weight-bold" name="btn_update" value="Update">
            </div>
        </form>
    </div>
</body>
</html>

