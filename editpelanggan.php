<?php 
// konfigurasi untuk koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

// Periksa koneksi database
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Periksa apakah id_pelanggan ada dalam URL
if(isset($_GET['id_pelanggan'])) {
    $id_pelanggan = mysqli_real_escape_string($conn, $_GET['id_pelanggan']);

    // Fetch data pelanggan dari database
    $selectSql = "SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
    $selectResult = mysqli_query($conn, $selectSql);

    // Periksa apakah query berhasil dieksekusi
    if($selectResult) {
        // Periksa apakah data ditemukan
        if(mysqli_num_rows($selectResult) > 0) {
            $row = mysqli_fetch_assoc($selectResult);
        } else {
            die("Data not found");
        }
    } else {
        die("Query failed: " . mysqli_error($conn));
    }
} else {
    die("ID not provided");
}

// untuk proses update 
if(isset($_POST["btn_update"])) {
    $id_pelanggan = $_POST["id_pelanggan"];
    $nama_pelanggan = $_POST["nama_pelanggan"];

    // Update data pelanggan ke database
    $updateSql = "CALL Update_Data_Pelanggan('$id_pelanggan','$nama_pelanggan')";
    if(mysqli_query($conn, $updateSql)) {
        header("location:pelanggan.php?updated=1");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Pelanggan</title>
  </head>
  <body>
    <div class="container box my-5">
      <form action="" name="edit_pelanggan" method="post">
        <h3 class="text-center">Edit Pelanggan</h3>
        <div class="form-group">
            <input type="text" name="id_pelanggan" value="<?php echo $row['id_pelanggan']; ?>" readonly>
            <input type="text" name="nama_pelanggan" value="<?php echo $row['nama_pelanggan']; ?>" required>
        </div>
        <div class="form-group text-center">
          <input type="submit" name="btn_update" value="Update">
        </div>
      </form>
    </div>
  </body>
</html>


