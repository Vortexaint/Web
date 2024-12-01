<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: Login.php");
    exit;
}
?>

<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and bind the statement
    $stmt = $koneksi->prepare("DELETE FROM kasir WHERE idKasir = ?");
    $stmt->bind_param("s", $id);

    if ($stmt->execute()) {
        header("Location: Kasir.php");
        exit();
    } else {
        echo "404 Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    header("Location: Kasir.php");
    exit();
}
?>
