<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '../../koneksi.php';
    $aksi = $_GET['aksi'];

    if($aksi == "tambah"){
        // Ambil data dari form
        $idpemasok = $_POST['pemasok'];
        $namabarang = $_POST['nama_barang'];
        $merk = $_POST['merk'];
        $ukuran = $_POST['ukuran'];
        $satuan = $_POST['satuan'];
        $idkategori = $_POST['kategori'];
        $hargabeli = $_POST['harga_beli'];
        $hargajual = $_POST['harga_jual'];
        $deskripsi = $_POST['deskripsi'];

        // Query untuk menambah data barang
        $sql = "INSERT INTO barang (id_pemasok, nama_barang, merk, ukuran, satuan, id_kategori, harga_beli, harga_jual, deskripsi_barang) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Menyiapkan statement untuk menghindari SQL Injection
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("issssssss", $idpemasok, $namabarang, $merk, $ukuran, $satuan, $idkategori, $hargabeli, $hargajual, $deskripsi);
        $stmt->execute();
        $stmt->close();

    } elseif($aksi == "edit"){
        $id = $_GET['id'];
        $idpemasok = $_POST['pemasok'];
        $namabarang = $_POST['nama_barang'];
        $merk = $_POST['merk'];
        $ukuran = $_POST['ukuran'];
        $satuan = $_POST['satuan'];
        $idkategori = $_POST['kategori'];
        $hargabeli = $_POST['harga_beli'];
        $hargajual = $_POST['harga_jual'];
        $deskripsi = $_POST['deskripsi'];

        // Query untuk update data barang
        $sql = "UPDATE barang SET id_pemasok=?, nama_barang=?, merk=?, ukuran=?, satuan=?, id_kategori=?, harga_beli=?, harga_jual=?, deskripsi_barang=? WHERE id_barang=?";

        // Menyiapkan statement untuk menghindari SQL Injection
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sssssssssi", $idpemasok, $namabarang, $merk, $ukuran, $satuan, $idkategori, $hargabeli, $hargajual, $deskripsi, $id);
        $stmt->execute();
        $stmt->close();

    } elseif($aksi == "hapus"){
        $id = $_GET['id'];

        // Cek apakah ada relasi data barang di tabel lain
        $checkQuery = $mysqli->prepare("SELECT * FROM persediaan WHERE id_barang = ?");
        $checkQuery->bind_param("i", $id);
        $checkQuery->execute();
        $result = $checkQuery->get_result();

        if ($result->num_rows > 0) {
            echo "Data tidak bisa dihapus karena masih digunakan di tabel lain.";
        } else {
            // Jika tidak ada relasi, lakukan penghapusan
            $sql = "DELETE FROM barang WHERE id_barang = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
            echo "Data berhasil dihapus.";
        }
    }
    
    // Mengarahkan kembali ke halaman dashboard
    header('Location: ../../dashboard.php?modul=barang');
    exit();
}
?>
