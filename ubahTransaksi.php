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
    <title>Ubah Transaksi - Vortex Mart</title>
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
    $idTransaksi = $_GET['id'];
    $result = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE idTransaksi = '$idTransaksi'");
    $d = mysqli_fetch_assoc($result);
    
    if (!$d) {
        echo "<p style='color: red;'>Data tidak ditemukan!</p>";
        exit;
    }
} else {
    echo "<p style='color: red;'>ID Transaksi tidak diberikan!</p>";
    exit;
}
?>

<div class="container">
    <h2>Ubah Transaksi</h2>
    <form action="" method="post">
        <div class="form-group">
            <label>ID Barang:</label>
            <select name="idBarang" required>
                <?php
                $barangData = mysqli_query($koneksi, "SELECT * FROM barang");
                while ($Kasir = mysqli_fetch_assoc($barangData)) {
                    $selected = ($barang['idBarang'] == $d['idBarang']) ? 'selected' : '';
                    echo "<option value='{$barang['idBarang']}' $selected>{$barang['idBarang']} ({$barang['namaBarang']})</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>ID Kasir:</label>
            <select name="idKasir" required>
                <?php
                $kasirData = mysqli_query($koneksi, "SELECT * FROM kasir");
                while ($kasir = mysqli_fetch_assoc($kasirData)) {
                    $selected = ($kasir['idKasir'] == $d['idKasir']) ? 'selected' : '';
                    echo "<option value='{$kasir['idKasir']}' $selected>{$kasir['idKasir']} ({$kasir['namaKasir']})</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>ID Pelanggan:</label>
            <select name="idPelanggan" required>
                <?php
                $pelangganData = mysqli_query($koneksi, "SELECT * FROM Pelanggan");
                while ($pelanggan = mysqli_fetch_assoc($pelangganData)) {
                    $selected = ($pelanggan['idPelanggan'] == $d['idPelanggan']) ? 'selected' : '';
                    echo "<option value='{$pelanggan['idPelanggan']}' $selected>{$pelanggan['idPelanggan']} ({$pelanggan['namaPelanggan']})</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Jumlah Barang:</label>
            <input type="number" name="jumlahBarang" value="<?php echo $d['jumlahBarang']; ?>"  required>
        </div>
        <div class="form-group">
            <label>Tanggal:</label>
            <input type="date" name="tanggalTransaksi" value="<?php echo $d['tanggalTransaksi']; ?>" required>
        <input type="submit" name="submit" value="Simpan">
    </form>

    <?php
    // Handle form submission to update data
    if (isset($_POST['submit'])) {
        $idBarang = $_POST['idBarang'];
        $idKasir = $_POST['idKasir'];
        $idPelanggan = $_POST['idPelanggan'];
        $jumlahBarang = $_POST['jumlahBarang'];
        $tanggalTransaksi = $_POST['tanggalTransaksi'];

        $updateQuery = "UPDATE transaksi SET idBarang='$idBarang', idKasir='$idKasir', idPelanggan='$idPelanggan', jumlahBarang='$jumlahBarang', tanggalTransaksi='$tanggalTransaksi' WHERE idTransaksi='$idTransaksi'";
        
        if (mysqli_query($koneksi, $updateQuery)) {
            header("Location: Transaksi.php");
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
