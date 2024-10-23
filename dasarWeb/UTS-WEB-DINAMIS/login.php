<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <form method="POST" action="">
        <h2>Login</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>

    <?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $query->execute(['username' => $username, 'password' => md5($password)]);

        if ($query->rowCount() > 0) {
            header("Location: dashboard.php");
        } else {
            echo "<p>Invalid username or password.</p>";
        }
    }
    ?>
</body>
</html>
