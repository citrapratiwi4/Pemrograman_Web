<?php
$conn = new mysqli("localhost", "root", "", "penjualan");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal = $_POST['tanggal_penjualan'];
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah_terjual'];
    $total = $harga * $jumlah;

    $sql = "INSERT INTO laporan_penjualan (tanggal_penjualan, nama_produk, harga, jumlah_terjual, total_penjualan)
            VALUES ('$tanggal', '$nama', $harga, $jumlah, $total)";
    $conn->query($sql);
}

header("Location: index.php");
?>
