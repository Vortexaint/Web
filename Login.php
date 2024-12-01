<?php
session_start();

// Redirect to dashboard if already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Vortex Mart</title>
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

        .form-control {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 2px solid #fff;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0);
            color: white;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 1);
            font-size: 1em;
        }

        .form-control::placeholder {
            color: white
        }

        .button {
            width: 150px;
            height: 40px;
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

    <div class="dashboard-container">
        <form action="CekLog.php" method="POST" autocomplete="off">
            <a href="Login.php">
                <div class="footer">Vortex Mart</div>
            </a>
            <h1 class="dashboard-title">Login</h1>
            
            <input type="text" class="form-control" name="userKasir" placeholder="Username" required>
            <input type="password" class="form-control" name="password" placeholder="Password" required>

            <center>
                <div class="buttons">
                    <button type="submit" class="button">Login</button>
                </div>
            </center>
        </form>
    </div>
</body>
</html>
