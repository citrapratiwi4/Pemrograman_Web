<?php
$mysqli = new mysqli("localhost","root","","dbretail");
if ($mysqli->connect_error) {
    die("Koneksi Gagal : " . $mysqli->connect_error);  
}
?>