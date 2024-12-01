<?php
ob_start();
include 'koneksi.php';
?>

<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: Login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Pelanggan - Vortex Mart</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-image: url('Assets/blurred-Ice.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            text-align: center;
            color: white;
            padding: 20px;
            width: 60%; /* Set to a percentage or pixel value as desired */
            max-width: 800px; /* Set this to a larger value to control maximum width */
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .container h2 {
            font-size: 2.5em;
            color: #FFF;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            color: white;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            outline: none;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
        }

        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            font-size: 1em;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        .footer {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 1em;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php
// Fetching the data for the given idBarang
if (isset($_GET['id'])) {
    $idPelanggan = $_GET['id'];
    $result = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE idPelanggan = '$idPelanggan'");
    $d = mysqli_fetch_assoc($result);
    
    if (!$d) {
        echo "<p style='color: red;'>Data tidak ditemukan!</p>";
        exit;
    }
} else {
    echo "<p style='color: red;'>ID Pelanggan tidak diberikan!</p>";
    exit;
}
?>

<div class="container">
    <h2>Ubah Pelanggan</h2>
    <form action="" method="post">
        <div class="form-group">
            <label>Nama Pelanggan:</label>
            <input type="hidden" name="idPelanggan" value="<?php echo $d['idPelanggan']; ?>">
            <input type="text" name="namaPelanggan" value="<?php echo $d['namaPelanggan']; ?>" required>
        </div>
        <div class="form-group">
            <label>Nomor Telepon:</label>
            <input type="number" name="teleponPelanggan" value="<?php echo $d['teleponPelanggan']; ?>" required>
        </div>
        <input type="submit" name="submit" value="Simpan">
    </form>

    <?php
    // Handle form submission to update data
    if (isset($_POST['submit'])) {
        $namaPelanggan = $_POST['namaPelanggan'];
        $teleponPelanggan = $_POST['teleponPelanggan'];

        $updateQuery = "UPDATE pelanggan SET namaPelanggan='$namaPelanggan', teleponPelanggan='$teleponPelanggan' WHERE idPelanggan='$idPelanggan'";
        
        if (mysqli_query($koneksi, $updateQuery)) {
            header("Location: Pelanggan.php");
            exit;
        } else {
            echo "<p style='color:red;'>Data gagal disimpan: " . mysqli_error($koneksi) . "</p>";
        }
    }
    ?>
</div>
</body>
</html>

<?php
ob_end_flush();
?>
