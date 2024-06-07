<?php
// Konfigurasi untuk koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

// Periksa koneksi database
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Untuk proses insert 
if(isset($_POST["btn_add"])) {
    $id_pelanggan = $_POST["id_pelanggan"];
    $nama_pelanggan = $_POST["nama_pelanggan"];

    // Gunakan parameterized query untuk menghindari SQL injection
    $insertSql = "CALL Insert_Pelanggan('$id_pelanggan', '$nama_pelanggan')";
    
    if(mysqli_query($conn, $insertSql)) {
        header("location:pelanggan.php?inserted=1");
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
        <h2>Pelanggan</h2>
  
        <form action="" name="add_pelanggan" method="post">
            <input type="text" name="id_pelanggan" placeholder="ID Pelanggan" required>
            <input type="text" name="nama_pelanggan" placeholder="Nama Pelanggan" required>
            <button type="submit" name="btn_add">Save</button>
        </form>
        
        <!-- Tabel untuk menampilkan data buku -->
        <table border="1">
            <thead>
                <tr>
                    <th>ID Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $selectSql = "SELECT * FROM pelanggan ORDER BY id_pelanggan";
                    $selectResult = mysqli_query($conn, $selectSql);
                    if(mysqli_num_rows($selectResult) > 0) {
                        while($row = mysqli_fetch_array($selectResult)) { 
                ?>
                <tr>
                    <td><?php echo $row["id_pelanggan"]; ?></td>
                    <td><?php echo $row["nama_pelanggan"]; ?></td>
                    <td>
                        <a href="editpelanggan.php?edit=1&id_pelanggan=<?php echo $row["id_pelanggan"]; ?>" onclick="return confirm('Anda yakin ingin mengedit data Anda ?')">
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </a>

                        <a href="deletepelanggan.php?delete=1&id_pelanggan=<?php echo $row["id_pelanggan"]; ?>" onclick="return confirm('Are you sure you want to delete this item?')">
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
