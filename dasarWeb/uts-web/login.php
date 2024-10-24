<?php
//Session Start dan Koneksi Database
session_start();
require 'database.php';

//Proses Login (Handle Request POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = query("SELECT * FROM dbo.Users WHERE Username = ? AND Password = ?", [$username, $password]);

    if ($user) {
        $_SESSION['username'] = $username;
        header("Location: landing.php");
    } else {
        echo "<script>alert('Login gagal, silakan register terlebih dahulu!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleLogin.css">
    <title>Login Cafe</title>
</head>
<body>
    <div class="login-container">
        <form method="POST">
            <h2>LOGIN <br> CAFE CONTROLLING ASSISTANT</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <p>Belum punya akun? <a href="register.php">Register</a></p>
        </form>
    </div>
</body>
</html>