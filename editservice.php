<?php
// konfigurasi untuk koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

// Periksa koneksi database
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Untuk proses update 
if(isset($_POST["btn_update"])) {
    $id_service = $_POST["id_service"];
    $nama_service = $_POST["nama_service"];
    $lama_pengerjaan = $_POST["lama_pengerjaan"];
    $harga = $_POST["harga"];

    // Gunakan parameterized query untuk menghindari SQL injection
    $updateSql = "CALL Update_Data_Service('$id_service', '$nama_service', '$lama_pengerjaan', '$harga')";
    if(mysqli_query($conn, $updateSql)) {
        header("location:service.php?updated=1");
        exit(); // tambahkan exit setelah redirect untuk menghentikan eksekusi lebih lanjut
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Get the id_service from the URL
$id_service = isset($_GET['id_service']) ? mysqli_real_escape_string($conn, $_GET['id_service']) : '';

// Fetch the existing data for the id_service
$selectSql = "SELECT * FROM service WHERE id_service = '$id_service'";
$selectResult = mysqli_query($conn, $selectSql);
$row = mysqli_fetch_assoc($selectResult);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
</head>
<body>
    <div class="container box my-5">
      <form action="" name="edit_pelanggan" method="post">
        <h3 class="text-center">Edit Service</h3>
        <div class="form-group">
        <input type="hidden" name="id_service" value="<?php echo $row['id_service']; ?>">
        <input type="text" name="nama_service" value="<?php echo $row['nama_service']; ?>" required>
        <input type="text" name="lama_pengerjaan" value="<?php echo $row['lama_pengerjaan']; ?>" required>
        <input type="text" name="harga" value="<?php echo $row['harga']; ?>" required>
        </div>
        <div class="form-group text-center">
        <button type="submit" name="btn_update">Update</button>
        </div>
      </form>
    </div>
  </body>
</html>
