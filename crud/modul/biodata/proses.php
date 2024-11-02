<?php
 include "../../koneksi.php";
 if($_GET['action']=="insert"){
$npm = $_POST['npm'];
$nama = $_POST['nama'];
$prodi = $_POST['prodi'];
$query = "INSERT INTO biodata (npm, nama, prodi) VALUES ('$npm', '$nama', '$prodi')";
$mysqli->query($query);
header('location:../../index.php?modul=biodata');
 }elseif ($_GET['action']=="update") {
 $id = $_GET['id'];
 $npm = $_POST['npm'];
$nama = $_POST['nama'];
$query = "UPDATE biodata SET npm='$npm', nama='$nama' where id='$id'";
 $mysqli->query($query);
header('location:../../index.php?modul=biodata');
 }elseif ($_GET['action']=="delete") {
 $query = "DELETE FROM biodata where id='$_GET[id]'";
$mysqli->query($query);
 header('location:../../index.php?modul=biodata');
 }else{
 header('location:../../index.php');
}
?>

<?php
include '../koneksi.php'; // Pastikan path ke koneksi benar

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'update' && isset($_GET['id'])) {
        // Ambil data dari form
        $id = $_GET['id'];
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];

        // Siapkan query untuk update
        $query = "UPDATE biodata SET npm=?, nama=?, prodi=? WHERE id=?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('sssi', $npm, $nama, $prodi, $id);
        
        if ($stmt->execute()) {
            // Redirect setelah berhasil
            header('Location: index.php?message=Data berhasil diperbarui');
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } elseif ($_GET['action'] == 'delete' && isset($_GET['id'])) {
        // Kode untuk menghapus data
        $id = $_GET['id'];
        $query = "DELETE FROM biodata WHERE id=?";
        
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('i', $id);
        
        if ($stmt->execute()) {
            // Redirect setelah berhasil
            header('Location: index.php?message=Data berhasil dihapus');
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$mysqli->close();
?>
