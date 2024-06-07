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
    $id_jabatan = $_POST["id_jabatan"];
    $nama_pegawai = $_POST["nama_pegawai"];
    $alamat = $_POST["alamat"];
    $username = $_POST["username"];
    $password = $_POST["PASSWORD"];

    // Panggil stored procedure untuk insert data
    $insertSql = "CALL Insert_Pegawai('$id_pegawai', '$id_jabatan', '$nama_pegawai', '$alamat', '$username', '$password')";
    if (mysqli_query($conn, $insertSql)) {
        header("location:pegawai.php?inserted=1");
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
        <h2>Pegawai</h2>
  
        <form action="" name="add_jabatan" method="post">
            <input type="text" name="id_pegawai" placeholder="ID Pegawai" required>
            <input type="text" name="id_jabatan" placeholder="ID Jabatan" required>
            <input type="text" name="nama_pegawai" placeholder="Nama Pegawai" required>
            <input type="text" name="alamat" placeholder="Alamat" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="PASSWORD" name="PASSWORD" placeholder="PASSWORD" required>
            <button type="submit" name="btn_add">Save</button>
        </form>
        <!-- Tabel untuk menampilkan data pegawai -->
        <table border="1">
            <thead>
                <tr>
                    <th>ID Pegawai</th>
                    <th>ID Jabatan</th>
                    <th>Nama Pegawai</th>
                    <th>Alamat</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
              $selectSql = "SELECT * FROM pegawai ORDER BY id_pegawai";
              $selectResult = mysqli_query($conn, $selectSql);
              if(mysqli_num_rows($selectResult) > 0)
              {
                while($row = mysqli_fetch_array($selectResult))
              { 
            ?>
            <tr>
                <td><?php echo $row["id_pegawai"]; ?></td>
                <td><?php echo $row["id_jabatan"]; ?></td>
                <td><?php echo $row["nama_pegawai"]; ?></td>
                <td><?php echo $row["alamat"]; ?></td>
                <td><?php echo $row["username"]; ?></td>
                <td><?php echo $row["PASSWORD"]; ?></td>
                <td>
                    <a href="editpegawai.php?edit=1&id_pegawai=<?php echo $row["id_pegawai"]; ?>" onclick="return confirm('Anda yakin ingin mengedit data Anda ?')">
                  <button type="submit" class="btn btn-warning">Edit</button>
                </a>
                    <a href="deletepegawai.php?delete=1&id_pegawai=<?php echo $row["id_pegawai"]; ?>" onclick="return confirm('Are you sure you want to delete this item?')">
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
              <td colspan="7">No Data</td>
            </tr>
            <?php
              }            
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>
