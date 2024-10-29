<?php
$conn = new mysqli("localhost", "root", "", "penjualan_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM laporan_penjualan";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['tanggal_penjualan']}</td>
                <td>{$row['nama_produk']}</td>
                <td>{$row['harga']}</td>
                <td>{$row['jumlah_terjual']}</td>
                <td>{$row['total_penjualan']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}'>Edit</a>
                    <a href='delete.php?id={$row['id']}'>Hapus</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
}

$conn->close();
?>
