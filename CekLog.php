<?php
session_start();
include 'koneksi.php';

$userKasir = $_POST['userKasir'];
$password = $_POST['password'];

$result = mysqli_query($koneksi, "SELECT * FROM kasir WHERE userKasir='$userKasir' AND password='$password'");
if (mysqli_num_rows($result) > 0) {
    $_SESSION['loggedin'] = true;
    $_SESSION['userKasir'] = $userKasir;
    header("Location: Dashboard.php");
} else {
    echo "Username atau password Salah!";
    header("Location: Login.php");
}
?>