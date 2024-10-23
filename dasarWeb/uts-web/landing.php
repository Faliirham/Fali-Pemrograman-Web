<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="styleLanding.css"> 
</head>
<body>
    <div class="container"> <!-- Added container for layout -->
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>This is the landing page.</p>

        <h2>Features</h2>
        <ul>
            <li><a href="outlets.php">Outlets</a></li>
            <li><a href="outlet_popularity.php">Keramaian Outlet</a></li>
            <li><a href="favorite_menus.php">Menu Favorit</a></li>
            <li><a href="outlet_ratings.php">Rating Outlet</a></li>
            <li><a href="staff_list.php">List Staff</a></li>
        </ul>

        <a href="logout.php" class="logout">Logout</a>
    </div>
</body>
</html>