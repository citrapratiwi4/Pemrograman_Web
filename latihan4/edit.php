<?php
$conn = new mysqli("localhost", "root", "", "penjualan");
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM laporan_penjualan WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal = $_POST['tanggal_penjualan'];
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah_terjual'];
    $total = $harga * $jumlah;

    $conn->query("UPDATE laporan_penjualan SET tanggal_penjualan='$tanggal', nama_produk='$nama', harga=$harga, jumlah_terjual=$jumlah, total_penjualan=$total WHERE id=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Laporan</title>
    <style>
        h1{
            background-color: cadetblue;
            color: brown;
        }
        input{
            color: chartreuse;
            border-radius: 100px;
        }
    </style>
</head>
<body>
    <h1>Edit Laporan Penjualan</h1>
    <form method="POST">
        <input type="date" name="tanggal_penjualan" value="<?= $row['tanggal_penjualan'] ?>" required>
        <input type="text" name="nama_produk" value="<?= $row['nama_produk'] ?>" required>
        <input type="number" name="harga" value="<?= $row['harga'] ?>" step="0.01" required>
        <input type="number" name="jumlah_terjual" value="<?= $row['jumlah_terjual'] ?>" required>
        <input type="submit" value="Update">
    </form>
</body>
</html>
