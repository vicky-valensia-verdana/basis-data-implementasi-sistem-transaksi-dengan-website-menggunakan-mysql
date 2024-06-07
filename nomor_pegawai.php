<?php
// Konfigurasi untuk koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

// Periksa koneksi database
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Proses insert data
if (isset($_POST["btn_add"])) {
    $id_pegawai = $_POST["id_pegawai"];
    $id_nomor = $_POST["id_nomor"];
    $no_tlp = $_POST["no_tlp"];

    // Panggil stored procedure untuk insert data
    $insertSql = "CALL Insert_Nomor_Pegawai('$id_pegawai', '$id_nomor', '$no_tlp')";
    if (mysqli_query($conn, $insertSql)) {
        header("location:nomor_pegawai.php?inserted=1");
        exit(); // Hindari eksekusi kode selanjutnya setelah redirect
    } else {
        echo "Error: " . $insertSql . "<br>" . mysqli_error($conn);
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
        <h2>Nomor Pegawai</h2>
  
        <form action="" name="add_nopegawai" method="post">
            <input type="text" name="id_pegawai" placeholder="ID Pegawai" required>
            <input type="text" name="id_nomor" placeholder="ID Nomor" required>
            <input type="number" name="no_tlp" placeholder="No Telepon" required>
            <button type="submit" name="btn_add" class="btn-info">Save</button>
        </form>
        <!-- Tabel untuk menampilkan data buku -->
        <table border="1">
            <thead>
                <tr>
                    <th>ID Pegawai</th>
                    <th>ID Nomor</th>
                    <th>No Telepon</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
              $selectSql = "SELECT * FROM nomor_pegawai ORDER BY id_nomor";
              $selectResult = mysqli_query($conn, $selectSql);
              if(mysqli_num_rows($selectResult) > 0)
              {
                while($row = mysqli_fetch_array($selectResult))
              { 
            ?>
            <tr>
                <td><?php echo $row["id_pegawai"]; ?></td>
                <td><?php echo $row["id_nomor"]; ?></td>
                <td><?php echo $row["no_tlp"]; ?></td>
                <td>
                  
                <a href="editnomor_pegawai.php?edit=1&id_nomor=<?php echo $row["id_nomor"]; ?>" onclick="return confirm('Anda yakin ingin mengedit data Anda ?')">
                  <button type="submit" class="btn btn-warning">Edit</button>
                </a>

                <a href="deletenomor_pegawai.php?delete=1&id_nomor=<?php echo $row["id_nomor"]; ?>" onclick="return confirm('Are you sure you want to delete this item?')">
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
