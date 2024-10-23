<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <form method="POST" action="">
        <h2>Register</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register">Register</button>
    </form>

    <?php
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $query = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $query->execute(['username' => $username, 'password' => $password]);

        echo "<p>Registration successful! You can now <a href='login.php'>login</a>.</p>";
    }
    ?>
</body>
</html>