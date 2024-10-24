<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleLanding.css">
    <title>Landing Page</title>
    
</head>
<body>
    <div class="container"> 
        <h1>Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>

        <h2>CAFE CONTROLLING ASSISTANT</h2>
        <ul>
            <li><a href="outlets.php">Outlets</a></li>
            <li><a href="outletRamai.php">Keramaian Outlet</a></li>
            <li><a href="favorite_menus.php">Menu Favorit</a></li>
            <li><a href="ratingOutlet.php">Rating Outlet</a></li>
            <li><a href="staffOutlet.php">Daftar Staff</a></li>
        </ul>

        <a href="logout.php" class="logout">Logout</a>
    </div>
</body>
</html>