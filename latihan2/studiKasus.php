<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Penilaian Mahasiswa</title>
</head>
<body>

<h2>Aplikasi Penilaian Mahasiswa</h2>

<form method="post" action="">
    <label>Masukkan Nilai Mata Kuliah 1:</label>
    <input type="number" name="nilai1" min="0" max="100" required><br><br>

    <label>Masukkan Nilai Mata Kuliah 2:</label>
    <input type="number" name="nilai2" min="0" max="100" required><br><br>

    <label>Masukkan Nilai Mata Kuliah 3:</label>
    <input type="number" name="nilai3" min="0" max="100" required><br><br>

    <input type="submit" name="submit" value="Hitung">
</form>

<?php
if (isset($_POST['submit'])) {
    // Ambil nilai dari input form
    $nilai1 = $_POST['nilai1'];
    $nilai2 = $_POST['nilai2'];
    $nilai3 = $_POST['nilai3'];


    // Pastikan semua nilai adalah angka dan valid
    if (is_numeric($nilai1) && is_numeric($nilai2) && is_numeric($nilai3)) {
        // Hitung rata-rata
        $rata_rata = ($nilai1 + $nilai2 + $nilai3 ) / 3;

        // Tentukan status kelulusan (misalnya, lulus jika rata-rata >= 60)
        if ($rata_rata >= 60) {
            $status = "Lulus";
        } else {
            $status = "Tidak Lulus";
        }

        // Tampilkan hasil
        echo "<h3>Nilai Rata-Rata: $rata_rata</h3>";
        echo "<h3>Status Kelulusan: $status</h3>";
    } else {
        echo "<h3>Harap masukkan nilai yang valid untuk semua mata kuliah.</h3>";
    }
}
?>

</body>
</html>
