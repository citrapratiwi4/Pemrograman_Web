<?php
include "koneksi.php"; 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Menggunakan prepared statement untuk mencegah SQL injection
    $query = "SELECT * FROM biodata WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $id); // Mengikat parameter, 'i' untuk integer
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Periksa apakah data ditemukan
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan!";
        exit; // Hentikan eksekusi jika data tidak ada
    }
} else {
    echo "ID tidak ditentukan!";
    exit; // Hentikan eksekusi jika ID tidak ada
}
?>

<h5>Form Edit Biodata Mahasiswa</h5>
<hr>

<form action="<?= 'proses.php?action=update&id=' . $id; ?>" method="post">
    <label for="npm">NPM</label>
    <input type="text" class="form-control" name="npm" value="<?= htmlspecialchars($row['npm']); ?>" required /><br>

    <label for="nama">Nama</label>
    <input type="text" class="form-control" name="nama" value="<?= htmlspecialchars($row['nama']); ?>" required /><br> <!-- Perbaiki 'name' menjadi 'nama' -->

    <label for="prodi">Prodi</label>
    <select name="prodi" class="form-control" required>
        <option <?= ($row['prodi'] == 'Sistem Informasi (S1)') ? 'selected' : ''; ?> value="Sistem Informasi (S1)">Sistem Informasi (S1)</option>
        <option <?= ($row['prodi'] == 'Teknik Informatika (S1)') ? 'selected' : ''; ?> value="Teknik Informatika (S1)">Teknik Informatika (S1)</option>
        <option <?= ($row['prodi'] == 'Bisnis Digital (S1)') ? 'selected' : ''; ?> value="Bisnis Digital (S1)">Bisnis Digital (S1)</option>
        <option <?= ($row['prodi'] == 'Manajemen Informatika (D3)') ? 'selected' : ''; ?> value="Manajemen Informatika (D3)">Manajemen Informatika (D3)</option>
        <option <?= ($row['prodi'] == 'Komputerisasi Akuntansi (D3)') ? 'selected' : ''; ?> value="Komputerisasi Akuntansi (D3)">Komputerisasi Akuntansi</option>
    </select>
    <br>
    <input type="submit" class="btn btn-primary" value="Simpan" />
</form>
