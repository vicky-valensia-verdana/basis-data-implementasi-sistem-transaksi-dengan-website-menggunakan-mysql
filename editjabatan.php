<?php
// konfigurasi untuk koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

// pastikan id_jabatan tersedia dalam URL
$id_jabatan = isset($_GET['id_jabatan']) ? $_GET['id_jabatan'] : '';

// ambil data jabatan dari database
$selectSql = "SELECT * FROM jabatan WHERE id_jabatan = '$id_jabatan'";
$selectResult = mysqli_query($conn, $selectSql);

// periksa apakah query berhasil dieksekusi
if (!$selectResult) {
    die("Kesalahan eksekusi kueri: " . mysqli_error($conn));
}

// ambil data jabatan dari hasil query
$row = mysqli_fetch_assoc($selectResult);

// proses update data jabatan
if(isset($_POST["btn_update"]))
{
    $id_jabatan = $_POST["id_jabatan"];
    $nama_jabatan = $_POST["nama_jabatan"];
    $gaji = $_POST["gaji"];
    
    // panggil stored procedure untuk mengupdate data jabatan
    $updateSql = "CALL Update_Data_Jabatan('$id_jabatan','$nama_jabatan','$gaji')";
    
    // eksekusi query update
    if(mysqli_query($conn, $updateSql))
    {
        header("location:index.php?updated=1");
        exit(); // hindari eksekusi kode selanjutnya setelah redirect
    }
    else
    {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Edit Jabatan</title>
  </head>
  <body>
    <div class="container box my-5">
      <form action="" name="edit_jabatan" method="post">
        <h3 class="text-center">Edit Jabatan</h3>
        <div class="form-group">
            <input type="text" name="id_jabatan" value="<?php echo $row['id_jabatan']; ?>" readonly>
            <input type="text" name="nama_jabatan" value="<?php echo $row['nama_jabatan']; ?>" required>
            <input type="text" name="gaji" value="<?php echo $row['gaji']; ?>" required>
        </div>
        <div class="form-group text-center">
          <input type="submit" class="form-control bg-info text-white font-weight-bold" name="btn_update" value="Update">
        </div>
      </form>
    </div>
  </body>
</html>
