<?php
$siswa = array("nama"=>"citra","umur"=>"19","kota"=>"Binjai","jurusan"=>"Sistem informasi");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width: 100%;
            border-collapse: collapse;

        }
        table td, th{
            border:1px solid black;
        }
        th, td{
            padding: 8px;
            text-align: left;
        }
    </style>

</head>
<body>
    <h2>Data Siswa</h2>
    <table>
        <tr>
            <th>Nama </th>
            <th>Umur</th>
            <th>Kota</th>
            <th>Jurusan</th>
        </tr>
        <tr>
            <td><?= $siswa['nama'];?></td>
            <td><?= $siswa['umur'];?></td>
            <td><?=$siswa['kota'];?></td>
            <td><?=$siswa['jurusan'];?></td>
    </table>
</body>
</html>