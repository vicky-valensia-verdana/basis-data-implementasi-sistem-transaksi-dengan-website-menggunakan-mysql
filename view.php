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
    <h2>View</h2>
    <table>
        <tr>
            <td>
                <a href="view_ban_dunlop.php">
                    <button type="submit">ban_dunlop</button>
                </a>
            </td>
            <td>
                <a href="view_daftar_pegawai.php">
                    <button type="submit">daftar_pegawai</button>
                </a>
            </td>
            <td>
                <a href="view_detail_transaksi.php">
                    <button type="submit">detail_transaksi</button>
                </a>
            </td>
            <td>
                <a href="view_pemasukan_pegawai_service.php">
                    <button type="submit">pemasukan_pegawai_servic</button>
                </a>
            </td>
        </tr>
    </table>
</div>

</body>
</html>
