<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pencatatan Data Penjualan</title>
</head>
<body>

<h2>Sistem Pencatatan Data Penjualan</h2>
<form method="POST" action="">
    <table border="1" cellspacing="0">
        <tr>
            <th>Nama</th>
            <th>Harga Per Produk</th>
            <th>Jumlah Terjual</th>
        </tr>
        <tr>
            <td>Produk A</td>
            <td><input type="number" name="harga_produkA" value="10000"></td>
            <td><input type="number" name="jumlah_terjualA" value="5"></td>
        </tr>
        <tr>
            <td>Produk B</td>
            <td><input type="number" name="harga_produkB" value="7500"></td>
            <td><input type="number" name="jumlah_terjualB" value="10"></td>
        </tr>
        <tr>
            <td>Produk C</td>
            <td><input type="number" name="harga_produkC" value="12000"></td>
            <td><input type="number" name="jumlah_terjualC" value="8"></td>
        </tr>
    </table>
    <br>
    <input type="submit" name="submit" value="Hitung Total Penjualan">
</form>

<?php
if (isset($_POST['submit'])) {
    // Retrieve form data
    $hargaA = $_POST['harga_produkA'];
    $jumlahA = $_POST['jumlah_terjualA'];
    $totalA = $hargaA * $jumlahA;

    $hargaB = $_POST['harga_produkB'];
    $jumlahB = $_POST['jumlah_terjualB'];
    $totalB = $hargaB * $jumlahB;

    $hargaC = $_POST['harga_produkC'];
    $jumlahC = $_POST['jumlah_terjualC'];
    $totalC = $hargaC * $jumlahC;

    // Total calculations
    $total_jumlah = $jumlahA + $jumlahB + $jumlahC;
    $total_penjualan = $totalA + $totalB + $totalC;
    ?>

    <!-- Display sales report -->
    <h2>Laporan Penjualan:</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Nama</th>
            <th>Harga Per Produk</th>
            <th>Jumlah Terjual</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>Produk A</td>
            <td><?php echo $hargaA; ?></td>
            <td><?php echo $jumlahA; ?></td>
            <td><?php echo $totalA; ?></td>
        </tr>
        <tr>
            <td>Produk B</td>
            <td><?php echo $hargaB; ?></td>
            <td><?php echo $jumlahB; ?></td>
            <td><?php echo $totalB; ?></td>
        </tr>
        <tr>
            <td>Produk C</td>
            <td><?php echo $hargaC; ?></td>
            <td><?php echo $jumlahC; ?></td>
            <td><?php echo $totalC; ?></td>
        </tr>
        <tr>
            <td colspan="2"><strong>Total Penjualan</strong></td>
            <td><strong><?php echo $total_jumlah; ?></strong></td>
            <td><strong><?php echo $total_penjualan; ?></strong></td>
        </tr>
    </table>
    
    <?php
}
?>

</body>
</html>
