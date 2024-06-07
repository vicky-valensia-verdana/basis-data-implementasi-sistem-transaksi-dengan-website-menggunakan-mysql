<?php 
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

if(isset($_POST["btn_update"])) {
    $updateSql = "CALL Update_Data_Header_Transaksi('{$_POST["id_header"]}','{$_POST["id_pegawai"]}','{$_POST["id_transaksi"]}')";
    if(mysqli_query($conn, $updateSql)) {
        header("location:header_transaksi.php?updated=1");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

$id_header = isset($_GET['id_header']) ? $_GET['id_header'] : null;

if ($id_header) {
    $selectSql = "SELECT * FROM header_transaksi WHERE id_header = '$id_header'";
    $selectResult = mysqli_query($conn, $selectSql);
    $row = mysqli_fetch_assoc($selectResult);
}
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Edit Header Transaksi</title>
  </head>
  <body>
    <div class="container box my-5">
      <form action="" name="edit_transaksi" method="post">
        <h3 class="text-center">Edit Header Transaksi</h3>
        <div class="form-group">
            <input type="text" name="id_header" value="<?php echo $row['id_header']; ?>" readonly>
            <input type="text" name="id_pegawai" value="<?php echo $row['id_pegawai']; ?>" required>
            <input type="text" name="id_transaksi" value="<?php echo $row['id_transaksi']; ?>" required>
        </div>
        <div class="form-group text-center">
          <input type="submit" class="form-control bg-info text-white font-weight-bold" name="btn_update" value="Update">
        </div>
      </form>
    </div>
  </body>
</html>
