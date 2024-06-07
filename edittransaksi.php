<?php
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_POST["btn_update"])) {
    $id_transaksi = $_POST["id_transaksi"];
    $id_pelanggan = $_POST["id_pelanggan"];
    $tgl_pembelian = $_POST["tanggal_pembelian"];
    $total_biaya = $_POST["total_biaya"];

    $updateSql = "CALL Update_Data_Transaksi('$id_transaksi','$id_pelanggan','$tgl_pembelian','$total_biaya')";
    if(mysqli_query($conn, $updateSql)) {
        header("location:transaksi.php?updated=1");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

$id_transaksi = $_GET['id_transaksi'];
$selectSql = "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi'";
$selectResult = mysqli_query($conn, $selectSql);

if (!$selectResult) {
    die("Error: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($selectResult);
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Edit Transaksi</title>
  </head>
  <body>
    <div class="container box my-5">
      <form action="" name="edit_transaksi" method="post">
        <h3 class="text-center">Edit Transaksi</h3>
        <div class="form-group">
            <input type="text" name="id_transaksi" value="<?php echo $row['id_transaksi']; ?>" readonly>
            <input type="text" name="id_pelanggan" value="<?php echo $row['id_pelanggan']; ?>" required>
            <input type="date" name="tanggal_pembelian" value="<?php echo $row['tgl_pembelian']; ?>" required>
            <input type="text" name="total_biaya" value="<?php echo $row['total_biaya']; ?>" required>
        </div>
        <div class="form-group text-center">
          <input type="submit" class="form-control bg-info text-white font-weight-bold" name="btn_update" value="Update">
        </div>
      </form>
    </div>
  </body>
</html>
