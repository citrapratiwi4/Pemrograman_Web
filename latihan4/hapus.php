<?php
$conn = new mysqli("localhost", "root", "", "penjualan");
$id = $_GET['id'];
$conn->query("DELETE FROM laporan_penjualan WHERE id=$id");
header("Location: index.php");
?>
