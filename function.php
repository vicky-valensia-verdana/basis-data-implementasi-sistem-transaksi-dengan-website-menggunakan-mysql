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
    <h2>Function</h2>
    <table>
        <tr>
            <td>
                <a href="function_gabungHurufService.php">
                    <button type="submit" class="btn btn-warning">gabungHurufService</button>
                </a>
            </td>
            <td>
                <a href="function_gabungHurufSparepart.php">
                    <button type="submit" class="btn btn-warning">gabungHurufSparepart</button>
                </a>
            </td>
            <td>
                <a href="function_tampilPegawai.php">
                    <button type="submit" class="btn btn-warning">tampilPegawai</button>
                </a>
            </td>
            <td>
                <a href="function_tampilServiceSparepart.php">
                    <button type="submit" class="btn btn-warning">tampilServiceSparepart</button>
                </a>
            </td>
        </tr>
    </table>
</div>

</body>
</html>
