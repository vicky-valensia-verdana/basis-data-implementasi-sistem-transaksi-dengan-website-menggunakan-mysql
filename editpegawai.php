<?php 
$conn = mysqli_connect("localhost", "root", "", "db_bengkel_mobil");

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if(isset($_POST["btn_update"]))
{
    $id_pegawai = $_POST["id_pegawai"];
    $id_jabatan = $_POST["id_jabatan"];
    $nama_pegawai = $_POST["nama_pegawai"];
    $alamat = $_POST["alamat"];
    $username = $_POST["username"];
    $password = $_POST["PASSWORD"];
    
    // Memperbaiki pemanggilan prosedur dengan menambahkan dua parameter yang hilang
    $updateSql = "CALL Update_Data_Pegawai('$id_pegawai','$id_jabatan','$nama_pegawai','$alamat','$username','$password')";
    
    if(mysqli_query($conn, $updateSql))
    {
        header("location:pegawai.php?updated=1");
        exit();
    } else {
        echo "Error: " . $updateSql . "<br>" . mysqli_error($conn);
    }
}

$id_pegawai = isset($_GET['id_pegawai']) ? $_GET['id_pegawai'] : '';

$selectSql = "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'";
$selectResult = mysqli_query($conn, $selectSql);

if (!$selectResult) {
    die("Kesalahan eksekusi kueri: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($selectResult);
?>

<!doctype html>
<html lang="en">
<head>
    <title>Edit Pegawai</title>
</head>
<body>
<div class="container box my-5">
    <form action="" name="edit_pegawai" method="post">
        <h3 class="text-center">Edit Pegawai</h3>
        <div class="form-group">
            <input type="text" name="id_pegawai" value="<?php echo $row['id_pegawai']; ?>" readonly>
            <input type="text" name="id_jabatan" value="<?php echo $row['id_jabatan']; ?>" readonly>
            <input type="text" name="nama_pegawai" value="<?php echo $row['nama_pegawai']; ?>" required>
            <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required>
            <input type="text" name="username" value="<?php echo $row['username']; ?>" required>
            <input type="text" name="PASSWORD" value="<?php echo $row['PASSWORD']; ?>" required>

        </div>
        <div class="form-group text-center">
            <input type="submit" class="form-control bg-info text-white font-weight-bold" name="btn_update" value="Update">
        </div>
    </form>
</div>
</body>
</html>