<?php
// konfigurasi utk koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");
// untuk proses insert 
if(isset($_POST["btn_add"]))
{
 $insertSql = "CALL Insert_PembelianService('".$_POST["id_pembelian_service"]."','".$_POST["id_transaksi"]."','".$_POST["id_pegawai"]."','".$_POST["id_service"]."')";
 if(mysqli_query($conn, $insertSql))
 {
  header("location:pembelian_service.php?inserted=1");
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Website</title>
    <!-- Hapus link stylesheet -->
</head>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll(".test");
        buttons.forEach(button => {
            button.addEventListener("click", function() {
                const page = this.getAttribute("data-page");
                window.location.href = page;
            });
        });
    });
</script>
<body>
    <nav>
    <table>
        <ul>
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
        </ul>
    </table>
    </nav>
    <div class="container">
        <h2>Pembelian Service</h2>
  
        <form action="" name="add_pembelian_service" method="post">
            <input type="text" name="id_pembelian_service" placeholder="ID Pembelian Service" required>
            <input type="text" name="id_transaksi" placeholder="ID Transaksi" required>
            <input type="text" name="id_pegawai" placeholder="ID Pegawai" required>
            <input type="text" name="id_service" placeholder="ID Service" required>
            <button type="submit" name="btn_add" class="btn-info">Save</button>
        </form>
        <!-- Tabel untuk menampilkan data buku -->
        <table border="1">
            <thead>
                <tr>
                    <th>ID Pembelian Service</th>
                    <th>ID Transaksi</th>
                    <th>ID Pegawai</th>
                    <th>ID Service</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
              $selectSql = "SELECT * FROM pembelian_service ORDER BY id_pembelian_service";
              $selectResult = mysqli_query($conn, $selectSql);
              if(mysqli_num_rows($selectResult) > 0)
              {
                while($row = mysqli_fetch_array($selectResult))
              { 
            ?>
            <tr>
                <td><?php echo $row["id_pembelian_service"]; ?></td>
                <td><?php echo $row["id_transaksi"]; ?></td>
                <td><?php echo $row["id_pegawai"]; ?></td>
                <td><?php echo $row["id_service"]; ?></td>
                <td>
                  
                <a href="editpembelianservice.php?edit=1&id_pembelian_service=<?php echo $row["id_pembelian_service"]; ?>" onclick="return confirm('Anda yakin ingin mengedit data Anda ?')">
                  <button type="submit" class="btn btn-warning">Edit</button>
                </a>

                <a href="deletepembelianservice.php?delete=1&id_pembelian_service=<?php echo $row["id_pembelian_service"]; ?>" onclick="return confirm('Are you sure you want to delete this item?')">
                  <button type="submit" class="btn btn-danger">Delete</button>
                </a>
                </td>
            </tr>
            <?php
                }
              }
              else
              {
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
