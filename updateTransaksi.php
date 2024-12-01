<?php<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: Login.php");
    exit;
}
?>

//include koneksi database
include('koneksi.php');

//get data dari form
$idTransaksi        = $_POST['idTransaksi'];
$idBarang           = $_POST['idBarang'];
$idPelanggan        = $_POST['idPelanggan'];
$jumlahBarang       = $_POST['jumlahBarang'];
$tanggalTransaksi   = $_POST['tanggalTransaksi'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE transaksi SET idBarang = '$idBarang', idPelanggan = '$idPelanggan', jumlahBarang = '$jumlahBarang', tanggalTransaksi = '$tanggalTransaksi' WHERE idTransaksi = '$idTransaksi'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman tampil.php 
    header("location: Transaksi.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>