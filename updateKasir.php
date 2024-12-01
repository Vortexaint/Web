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
$idKasir       = $_POST['idKasir'];
$namaKasir     = $_POST['namaKasir'];
$teleponKasir  = $_POST['teleponKasir'];
$userKasir     = $_POST['userKasir'];
$password      = $_POST['password'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE kasir SET namaKasir = '$namaKasir', teleponKasir = '$teleponKasir', userKasir = '$userKasir', password = '$password' WHERE idKasir = '$idKasir'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman tampil.php 
    header("location: Kasir.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>