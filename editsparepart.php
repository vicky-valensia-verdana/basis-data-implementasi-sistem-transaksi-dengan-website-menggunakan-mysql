<?php 
// konfigurasi untuk koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

// untuk proses update 
if(isset($_POST["btn_update"])) {
    $id_sparepart = $_POST["id_sparepart"];
    $nama_sparepart = $_POST["nama_sparepart"];
    $stok = $_POST["stok"];
    $jenis_sparepart = $_POST["jenis_sparepart"];
    $harga = $_POST["harga"];

    $updateSql = "CALL Update_Data_Sparepart('$id_sparepart', '$nama_sparepart', '$stok', '$jenis_sparepart', '$harga')";
    if(mysqli_query($conn, $updateSql)) {
        header("location:Sparepart.php?updated=1");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// get the id_sparepart from the URL
$id_sparepart = isset($_GET['id_sparepart']) ? $_GET['id_sparepart'] : '';

// fetch the existing data for the id_sparepart
$selectSql = "SELECT * FROM sparepart WHERE id_sparepart = '$id_sparepart'";
$selectResult = mysqli_query($conn, $selectSql);
$row = mysqli_fetch_assoc($selectResult);
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Edit Sparepart</title>
  </head>
  <body>
    <div class="container box my-5">
      <form action="" name="edit_sparepart" method="post">
        <h3 class="text-center">Edit Sparepart</h3>
        <div class="form-group">
            <input type="text" name="id_sparepart" value="<?php echo $row['id_sparepart']; ?>" readonly>
            <input type="text" name="nama_sparepart" value="<?php echo $row['nama_sparepart']; ?>" required>
            <input type="text" name="stok" value="<?php echo $row['stok']; ?>" required>
            <input type="text" name="jenis_sparepart" value="<?php echo $row['jenis_sparepart']; ?>" required>
            <input type="text" name="harga" value="<?php echo $row['harga']; ?>" required>
        </div>
        <div class="form-group text-center">
          <input type="submit" class="form-control bg-info text-white font-weight-bold" name="btn_update" value="Update">
        </div>
      </form>
    </div>
  </body>
</html>

