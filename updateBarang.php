<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: Login.php");
    exit;
}
?>

<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$idBarang       = $_POST['idBarang'];
$namaBarang     = $_POST['namaBarang'];
$stokBarang     = $_POST['stokBarang'];
$idJenis        = $_POST['idJenis'];
$hargaBarang    = $_POST['hargaBarang'];
$idRak          = $_POST['idRak'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE barang SET namaBarang = '$namaBarang', stokBarang = '$stokBarang', idJenis = '$idJenis', hargaBarang = '$hargaBarang', idRak = '$idRak' WHERE idBarang = '$idBarang'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman tampil.php 
    header("location:Dashboard.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>