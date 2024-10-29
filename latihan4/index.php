<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
</head>
<style>
    body{
        background-color: cadetblue;
    }
    h1{
        text-align: center;
        color: yellow;
        background-color: gainsboro;
    }
    th{
        background-color: gray;
    }
    input{
        border-radius: 80px;
        background-color: darkolivegreen;
        
       
    }

</style>
<body>
    <h1>Laporan Penjualan</h1>
    <br>
    <br>
    
    <h2>Tambah Laporan Penjualan</h2>
    <form action="tambah.php" method="POST">
        <input type="date" name="tanggal_penjualan" required><br>
        <input type="text" name="nama_produk" placeholder="Nama Produk" required><br>
        <input type="number" name="harga" placeholder="Harga" step="0.01" required><br>
        <input type="number" name="jumlah_terjual" placeholder="Jumlah" required>
        <input type="submit" value="Tambah">
    </form>
    <br>
    <br>
    <br>
    <br>
    
    <h3>Daftar Laporan Penjualan</h3><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
        <?php
        $conn = new mysqli("localhost", "root", "", "penjualan");
        $sql = "SELECT * FROM laporan_penjualan";
        $result = $conn->query($sql);
        
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
                        <a href='hapus.php?id={$row['id']}'>Hapus</a>
                    </td>
                </tr>";
        }
        ?>
    </table>
</body>
</html>
