<?php
// Array multidimensi untuk nilai mahasiswa
$nilai = array(
    array('Nama' => 'Budi', 'Tugas' => 90, 'UTS' => 85, 'UAS' => 88),
    array('Nama' => 'Siti', 'Tugas' => 78, 'UTS' => 92, 'UAS' => 87),
    array('Nama' => 'Andi', 'Tugas' => 65, 'UTS' => 70, 'UAS' => 75)
);
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Mahasiswa</title>
</head>
<body>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Nama</th>
        <th>Tugas</th>
        <th>UTS</th>
        <th>UAS</th>
    </tr>

    <?php
    // Menampilkan data menggunakan perulangan foreach
    foreach ($nilai as $data) {
        echo "<tr>";
        echo "<td>" . $data['Nama'] . "</td>";
        echo "<td>" . $data['Tugas'] . "</td>";
        echo "<td>" . $data['UTS'] . "</td>";
        echo "<td>" . $data['UAS'] . "</td>";
        echo "</tr>";
    }
    ?>
    
</table>

</body>
</html>
