<?php
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_POST["btn_update"])) {
    $id_pembelian_sparepart = $_POST["id_pembelian_sparepart"];
    $id_transaksi = $_POST["id_transaksi"];
    $id_sparepart = $_POST["id_sparepart"];
    $jumlah_beli = $_POST["jumlah_beli"];

    $updateSql = "CALL Update_Data_Pembelian_Sparepart('$id_pembelian_sparepart', '$id_transaksi', '$id_sparepart', '$jumlah_beli')";
    if (mysqli_query($conn, $updateSql)) {
        header("location:pembelian_sparepart.php?updated=1");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

$id_pembelian_sparepart = $_GET['id_pembelian_sparepart'];
$selectSql = "SELECT * FROM pembelian_sparepart WHERE id_pembelian_sparepart = '$id_pembelian_sparepart'";
$selectResult = mysqli_query($conn, $selectSql);

if (!$selectResult) {
    die("Error: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($selectResult);
?>


<!doctype html>
<html lang="en">
<head>
    <title>Edit Pembelian Sparepart</title>
</head>
<body>
<div class="container box my-5">
    <form action="" name="edit_pembeliansparepart" method="post">
        <h3 class="text-center">Edit Pembelian Sparepart</h3>
        <div class="form-group">
            <input type="text" name="id_pembelian_sparepart" value="<?= $row['id_pembelian_sparepart']; ?>" readonly>
            <input type="text" name="id_transaksi" value="<?= $row['id_transaksi']; ?>" required>
            <input type="text" name="id_sparepart" value="<?= $row['id_sparepart']; ?>" required>
            <input type="text" name="jumlah_beli" value="<?= $row['jumlah_beli']; ?>" required>
        </div>
        <div class="form-group text-center">
            <input type="submit" class="form-control bg-info text-white font-weight-bold" name="btn_update"
                   value="Update">
        </div>
    </form>
</div>
</body>
</html>

<?php
mysqli_close($conn);
?>
