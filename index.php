<?php
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

if(isset($_POST["btn_add"]))
{
 $insertSql = "CALL Insert_Jabatan('".$_POST["id_jabatan"]."','".$_POST["nama_jabatan"]."','".$_POST["gaji"]."')";
 if(mysqli_query($conn, $insertSql))
 {
  header("location:index.php?inserted=1");
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
    </nav>
    <div class="container">
        <h2>Jabatan</h2>
  
        <form action="" name="add_jabatan" method="post">
            <input type="text" name="id_jabatan" placeholder="ID Jabatan" required>
            <input type="text" name="nama_jabatan" placeholder="Nama Jabatan" required>
            <input type="text" name="gaji" placeholder="Gaji" required>
            <button type="submit" name="btn_add" class="btn-info">Save</button>
        </form>
        <table border="1">
            <thead>
                <tr>
                    <th>ID Jabatan</th>
                    <th>Nama Jabatan</th>
                    <th>Gaji</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $selectSql = "SELECT * FROM jabatan ORDER BY id_jabatan";
                $selectResult = mysqli_query($conn, $selectSql);
                if(mysqli_num_rows($selectResult) > 0)
                {
                    while($row = mysqli_fetch_array($selectResult))
                    { 
                ?>
                    <tr>
                        <td><?php echo $row["id_jabatan"]; ?></td>
                        <td><?php echo $row["nama_jabatan"]; ?></td>
                        <td><?php echo $row["gaji"]; ?></td>
                        <td>
                        
                            <a href="editjabatan.php?edit=1&id_jabatan=<?php echo $row["id_jabatan"]; ?>" onclick="return confirm('Anda yakin ingin mengedit data Anda ?')">
                                <button type="submit" class="btn btn-warning">Edit</button>
                            </a>

                            <a href="deletejabatan.php?delete=1&id_jabatan=<?php echo $row["id_jabatan"]; ?>" onclick="return confirm('Are you sure you want to delete this item?')">
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
