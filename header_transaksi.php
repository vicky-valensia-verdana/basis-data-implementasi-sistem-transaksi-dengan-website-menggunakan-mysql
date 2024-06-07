<?php
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if(isset($_POST["btn_add"])) {
    $id_header = $_POST["id_header"];
    $id_pegawai = $_POST["id_pegawai"];
    $id_transaksi = $_POST["id_transaksi"];

    $insertSql = "CALL Insert_Header_Transaksi('$id_header', '$id_pegawai', '$id_transaksi')";
    
    if(mysqli_query($conn, $insertSql)) {
        header("location:header_transaksi.php?inserted=1");
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Website</title>
</head>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll(".test");
        buttons.forEach(button => {
            button.addEventListener("click", function() {
                window.location.href = this.getAttribute("data-page");
            });
        });
    });
</script>
<body>
<nav>
    <table>
        <tr>
            <td><button class="test" data-page="index.php">Jabatan</button></td>
            <td><button class="test" data-page="pegawai.php">Pegawai</button></td>
            <td><button class="test" data-page="nomor_pegawai.php">Nomor Pegawai</button></td>
            <td><button class="test" data-page="pelanggan.php">Pelanggan</button></td>
            <td><button class="test" data-page="service.php">Service</button></td>
            <td><button class="test" data-page="sparepart.php">Sparepart</button></td>
            <td><button class="test" data-page="pembelian_service.php">Pembelian Service</button></td>
            <td><button class="test" data-page="pembelian_sparepart.php">Pembelian Sparepart</button></td>
            <td><button class="test" data-page="transaksi.php">Transaksi</button></td>
            <td><button class="test" data-page="header_transaksi.php">Header Transaksi</button></td>
            <td><button class="test" data-page="view.php">View</button></td>
            <td><button class="test" data-page="function.php">Function</button></td>
        </tr>
    </table>
</nav>
    <div class="container">
        <h2>Header Transaksi</h2>
  
        <form action="" name="add_service" method="post">
            <input type="text" name="id_header" placeholder="ID Header" required>
            <input type="text" name="id_pegawai" placeholder="ID Pegawai" required>
            <input type="text" name="id_transaksi" placeholder="ID Transaksi" required>
            <button type="submit" name="btn_add" class="btn-info">Save</button>
        </form>
        <table border="1">
            <thead>
                <tr>
                    <th>ID Header</th>
                    <th>ID Pegawai</th>
                    <th>ID Transaksi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
              $selectSql = "SELECT * FROM header_transaksi ORDER BY id_header";
              $selectResult = mysqli_query($conn, $selectSql);
              if(mysqli_num_rows($selectResult) > 0) {
                while($row = mysqli_fetch_array($selectResult)) { 
            ?>
            <tr>
                <td><?php echo $row["id_header"]; ?></td>
                <td><?php echo $row["id_pegawai"]; ?></td>
                <td><?php echo $row["id_transaksi"]; ?></td>
                <td>
                  
                <a href="editheadertransaksi.php?edit=1&id_header=<?php echo $row["id_header"]; ?>" onclick="return confirm('Anda yakin ingin mengedit data Anda ?')">
                  <button type="submit" class="btn btn-warning">Edit</button>
                </a>

                <a href="deleteheadertransaksi.php?delete=1&id_header=<?php echo $row["id_header"]; ?>" onclick="return confirm('Are you sure you want to delete this item?')">
                  <button type="submit" class="btn btn-danger">Delete</button>
                </a>
                </td>
            </tr>
            <?php
                }
              } else {
            ?>
            <tr>
              <td colspan="3">No Data</td>
            </tr>
            <?php
              }            
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>

