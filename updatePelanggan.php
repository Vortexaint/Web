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
$idPelanggan       = $_POST['idPelanggan'];
$namaPelanggan     = $_POST['namaPelanggan'];
$teleponPelanggan  = $_POST['teleponPelanggan'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE pelanggan SET namaPelanggan = '$namaPelanggan', teleponPelanggan = '$teleponPelanggan' WHERE idPelanggan = '$idPelanggan'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman tampil.php 
    header("location: Pelanggan.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>