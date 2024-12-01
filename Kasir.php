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
    <title>Data Barang - Vortex Mart</title>
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
            width: 90%;
            max-width: 800px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .title {
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .add-item {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 15px;
            display: inline-block;
            color: #ADD8E6;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .table-container {
            max-height: 300px;
            overflow-y: auto;
            margin-top: 15px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 10px;
            text-align: left;
            color: white;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .table th {
            font-weight: bold;
            color: #ADD8E6;
        }

        .table tr:hover {
            background-color: rgba(173, 216, 230, 0.3);
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .button-action {
            width: 60px;
            height: 30px;
            border: 2px solid #FFFFFF;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: white;
            font-size: 1em;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            background-color: transparent;
            transition: background-color 0.3s;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .button-action:hover {
            background-color: #ADD8E6;
            color: black;
        }

        .footer {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 1em;
            color: white;
            font-weight: bold;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
        }

        @media (max-width: 768px) {
            .table-container {
                max-height: 250px;
                margin-top: 10px;
            }

            .table th, .table td {
                padding: 5px;
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <a href="Dashboard.php">
        <div class="footer">Vortex Mart</div></a>
        <h1 class="title">Data Kasir</h1>
        <a href="tambahKasir.php" class="add-item">Tambah Kasir</a>
        
        <div class="table-container">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
                <?php
                include 'koneksi.php';
                $data = mysqli_query($koneksi, "SELECT * FROM kasir");
                if (!$data) {
                    die("Query failed: " . mysqli_error($koneksi));
                }
                while($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($d['idKasir']); ?></td>
                        <td><?php echo htmlspecialchars($d['namaKasir']); ?></td>
                        <td><?php echo htmlspecialchars($d['teleponKasir']); ?></td>
                        <td><?php echo htmlspecialchars($d['userKasir']); ?></td>
                        <td><?php echo htmlspecialchars($d['password']); ?></td>
                        <td class="action-buttons">
                            <a href="ubahKasir.php?id=<?php echo $d['idKasir']; ?>" class="button-action">Ubah</a>
                            <a href="hapusKasir.php?id=<?php echo $d['idKasir']; ?>" class="button-action" onclick="return confirm('Yakin?');">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
                <!-- Add more rows as needed -->
            </table>
        </div>
    </div>

</body>
</html>
