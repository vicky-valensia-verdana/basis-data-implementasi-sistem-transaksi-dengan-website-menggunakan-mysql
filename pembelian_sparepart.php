<?php
// konfigurasi utk koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");
// untuk proses insert 
if(isset($_POST["btn_add"]))
{
 $insertSql = "CALL Insert_PembelianSparepart('".$_POST["id_pembelian_sparepart"]."','".$_POST["id_transaksi"]."','".$_POST["id_sparepart"]."','".$_POST["jumlah_beli"]."')";
 if(mysqli_query($conn, $insertSql))
 {
  header("location:pembelian_sparepart.php?inserted=1");
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
        <h2>Pembelian Sparepart</h2>
  
        <form action="" name="add_pembelian_sparepart" method="post">
            <input type="text" name="id_pembelian_sparepart" placeholder="ID Pembelian Sparepart" required>
            <input type="text" name="id_transaksi" placeholder="ID Transaksi" required>
            <input type="text" name="id_sparepart" placeholder="ID Sparepart" required>
            <input type="text" name="jumlah_beli" placeholder="Jumlah Beli" required>
            <button type="submit" name="btn_add" class="btn-info">Save</button>
        </form>
        <table border="1">
            <thead>
                <tr>
                    <th>ID Pembelian Sparepart</th>
                    <th>ID Transaksi</th>
                    <th>ID Sparepart</th>
                    <th>Jumlah Beli</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
              $selectSql = "SELECT * FROM pembelian_sparepart ORDER BY id_pembelian_sparepart";
              $selectResult = mysqli_query($conn, $selectSql);
              if(mysqli_num_rows($selectResult) > 0)
              {
                while($row = mysqli_fetch_array($selectResult))
              { 
            ?>
            <tr>
                <td><?php echo $row["id_pembelian_sparepart"]; ?></td>
                <td><?php echo $row["id_transaksi"]; ?></td>
                <td><?php echo $row["id_sparepart"]; ?></td>
                <td><?php echo $row["jumlah_beli"]; ?></td>
                <td>
                  
                <a href="editpembeliansparepart.php?edit=1&id_pembelian_sparepart=<?php echo $row["id_pembelian_sparepart"]; ?>" onclick="return confirm('Anda yakin ingin mengedit data Anda ?')">
                  <button type="submit" class="btn btn-warning">Edit</button>
                </a>

                <a href="deletepembeliansparepart.php?delete=1&id_pembelian_sparepart=<?php echo $row["id_pembelian_sparepart"]; ?>" onclick="return confirm('Are you sure you want to delete this item?')">
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
