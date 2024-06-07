<?php 
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

if(isset($_POST["btn_update"])) {
    $updateSql = "CALL Update_Data_Pembelian_Service('{$_POST["id_pembelian_service"]}','{$_POST["id_transaksi"]}','{$_POST["id_pegawai"]}','{$_POST["id_service"]}')";
    if(mysqli_query($conn, $updateSql)) {
        header("location:pembelian_service.php?updated=1");
        exit();
    }
}

if(isset($_GET['id_pembelian_service'])) {
    $id_pembelian_service = $_GET['id_pembelian_service'];
    $selectSql = "SELECT * FROM pembelian_service WHERE id_pembelian_service = '$id_pembelian_service'";
    if($selectResult = mysqli_query($conn, $selectSql)) {
        $row = mysqli_fetch_assoc($selectResult);
    } else {
        echo "Error fetching record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid or missing 'id_pembelian_service' parameter.";
}
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Edit Pembelian Service</title>
  </head>
  <body>
    <div class="container box my-5">
      <form action="" name="edit_pembelianservice" method="post">
        <h3 class="text-center">Edit Pembelian Service</h3>
        <div class="form-group">
            <input type="text" name="id_pembelian_service" value="<?php echo $row['id_pembelian_service']; ?>" readonly>
            <input type="text" name="id_transaksi" value="<?php echo $row['id_transaksi']; ?>" required>
            <input type="text" name="id_pegawai" value="<?php echo $row['id_pegawai']; ?>" required>
            <input type="text" name="id_service" value="<?php echo $row['id_service']; ?>" required>
        </div>
        <div class="form-group text-center">
          <input type="submit" class="form-control bg-info text-white font-weight-bold" name="btn_update" value="Update">
        </div>
      </form>
    </div>
  </body>
</html>
