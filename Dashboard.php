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
    <title>Dashboard - Vortex Mart</title>
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

        .dashboard-container {
            text-align: center;
            color: white;
            padding: 20px;
            max-width: 800px;
            background: rgba(255, 255, 255, 0.1); /* Light transparent background */
            border-radius: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Black shadow for title */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .dashboard-title {
            font-size: 2.5em;
            color: #FFF;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .buttons-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .button {
            width: 150px;
            height: 100px;
            border: 2px solid #FFFFFF;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: white;
            font-size: 1.2em;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            background-color: transparent;
            transition: color 0.3s, border-color 0.3s;
        }

        .button:hover {
            color: #ADD8E6;
            border-color: #ADD8E6;
            background-color: rgba(255, 255, 255, 0.3);
        }

        .button img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
            transition: filter 0.3s;
        }

        .button:hover img {
            filter: brightness(0) saturate(100%) invert(70%) sepia(100%) saturate(500%) hue-rotate(180deg)
        }

        .footer {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 1em;
            color: white;
            font-weight: bold;
        }

        /* Sign Out Button Styling */
        .signout-button {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 10px 20px;
            font-size: 1em;
            color: white;
            background-color: transparent;
            border: 2px solid #FFF;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .signout-button:hover {
            border: 2px solid #FF0000;
            color: red;
        }
    </style>
</head>
<body>
    <form action="signout.php" method="post">
        <button type="submit" class="signout-button">Sign Out</button>
    </form>
    <div class="dashboard-container">
        <a href="Dashboard.php">
        <div class="footer">Vortex Mart</div></a>
        <h1 class="dashboard-title">Dashboard</h1>
        <div class="buttons-container">
            <a href="Barang.php" class="button">
                <img src="Assets/stok-icon.png" alt="Data Barang Icon"> 
                Data Barang
            </a>
            <a href="Transaksi.php" class="button">
                <img src="Assets/transaction-icon.png" alt="Data Transaksi Icon"> 
                Data Transaksi
            </a>
            <a href="Kasir.php" class="button">
                <img src="Assets/user-icon.png" alt="Data Kasir Icon"> 
                Data Kasir
            </a>
            <a href="Pelanggan.php" class="button">
                <img src="Assets/user-icon.png" alt="Data Pelanggan Icon"> 
                Data Pelanggan
            </a>
        </div>
    </div>

</body>
</html>